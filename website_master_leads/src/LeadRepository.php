<?php
declare(strict_types=1);

if (!defined('APP_BOOT')) { http_response_code(403); exit('Forbidden'); }

final class LeadRepository
{
    /** Columns DataTables may order/search on, in display order. */
    public const COLUMNS = [
        'detect_device',
        'detect_device_name',
        'City__c',
        'Country__c',
        'Browser__c',
        'Operating_System__c',
        'name',
        'email',
        'phone',
        'date_schedule',
        'location',
        'min_budget',
        'max_budget',
        'reasons_for_purchase',
        'current_residential_status',
        'unit_configurations',
        'message',
        'project_name',
        'form_name',
        'last_updated_time',
        'page_url',
        'PrimarySource',
        'SecondarySource',
        'TertiarySource',
        'SubSource',
        'Campaign',
        'ADCampaignID',
        'AdSetID',
        'AdID',
        'Device',
        'Placement',
        'GCLID',
        'ip_address',
    ];

    private static function table(): string
    {
        return $GLOBALS['CONFIG']['table'];
    }

    /**
     * Returns the FROM-clause source for every lead query. When 'leads.max_leads' is
     * set to N > 0, every query reads from a derived table containing only the newest
     * N rows by last_updated_time — so counts, pagination, stats, and distinct lookups
     * all operate on exactly those N leads. When N <= 0, returns the raw table name.
     */
    private static function source(): string
    {
        $table = self::table();
        $max = (int) ($GLOBALS['CONFIG']['leads']['max_leads'] ?? 0);
        if ($max <= 0) return $table;
        // $max is a safe integer (cast above). Inline — LIMIT cannot be parameterized
        // inside a derived-table subquery on many MySQL versions.
        return "(SELECT * FROM $table ORDER BY last_updated_time DESC LIMIT $max) AS scoped";
    }

    /**
     * Build [WHERE-clause, params[]] from filters.
     * @param array{project?:?string,search?:?string,date_from?:?string,date_to?:?string,source?:?string} $f
     */
    private static function buildWhere(array $f): array
    {
        $where  = [];
        $params = [];

        if (!empty($f['project'])) {
            $where[] = 'project_name = :project';
            $params[':project'] = $f['project'];
        }

        if (!empty($f['date_from'])) {
            $where[] = 'last_updated_time >= :date_from';
            $params[':date_from'] = $f['date_from'] . ' 00:00:00';
        }

        if (!empty($f['date_to'])) {
            $where[] = 'last_updated_time <= :date_to';
            $params[':date_to'] = $f['date_to'] . ' 23:59:59';
        }

        if (!empty($f['source'])) {
            $where[] = 'PrimarySource = :source';
            $params[':source'] = $f['source'];
        }

        if (!empty($f['search'])) {
            $searchable = ['name', 'email', 'phone', 'City__c', 'Campaign', 'project_name', 'form_name'];
            $parts = [];
            foreach ($searchable as $i => $col) {
                $k = ':s' . $i;
                $parts[] = "$col LIKE $k";
                $params[$k] = '%' . $f['search'] . '%';
            }
            $where[] = '(' . implode(' OR ', $parts) . ')';
        }

        return [
            $where ? 'WHERE ' . implode(' AND ', $where) : '',
            $params,
        ];
    }

    /**
     * DataTables server-side payload.
     * @param array $req  DataTables request ($_GET)
     * @param array $scope Auth scope: ['project' => ?string] to force-filter by project
     */
    public static function paginate(array $req, array $scope): array
    {
        $pdo    = Db::pdo();
        $source = self::source();

        $filters = [
            'project'   => $scope['project'] ?? ($req['project'] ?? null),
            'search'    => $req['search']['value'] ?? null,
            'date_from' => $req['date_from'] ?? null,
            'date_to'   => $req['date_to']   ?? null,
            'source'    => $req['source']    ?? null,
        ];

        // Non-admins cannot override their project scope.
        if (!empty($scope['project'])) {
            $filters['project'] = $scope['project'];
        }

        [$whereSql, $params] = self::buildWhere($filters);

        // Total (scoped, no user filters) — counts only the capped set
        $totalWhere = '';
        $totalParams = [];
        if (!empty($scope['project'])) {
            $totalWhere = 'WHERE project_name = :project';
            $totalParams[':project'] = $scope['project'];
        }
        $total = (int) self::scalar($pdo, "SELECT COUNT(*) FROM $source $totalWhere", $totalParams);

        // Filtered total
        $filtered = (int) self::scalar($pdo, "SELECT COUNT(*) FROM $source $whereSql", $params);

        // Sorting — whitelist column name + direction
        $orderCol = 'last_updated_time';
        $orderDir = 'DESC';
        if (!empty($req['order_col']) && in_array($req['order_col'], self::COLUMNS, true)) {
            $orderCol = $req['order_col'];
        }
        if (isset($req['order'][0]['dir'])) {
            $orderDir = strtolower($req['order'][0]['dir']) === 'asc' ? 'ASC' : 'DESC';
        }

        $leadsCfg  = $GLOBALS['CONFIG']['leads'] ?? [];
        $defaultLen = (int) ($leadsCfg['page_size_default'] ?? 25);
        $maxLen     = (int) ($leadsCfg['page_size_max']     ?? 500);

        $start  = max(0, (int) ($req['start']  ?? 0));
        $length = (int) ($req['length'] ?? $defaultLen);
        if ($length <= 0 || $length > $maxLen) $length = $defaultLen;

        $sql = "SELECT * FROM $source $whereSql"
             . ' ORDER BY ' . $orderCol . ' ' . $orderDir
             . ' LIMIT :limit OFFSET :offset';

        $stmt = $pdo->prepare($sql);
        foreach ($params as $k => $v) $stmt->bindValue($k, $v);
        $stmt->bindValue(':limit',  $length, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $start,  PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll();

        return [
            'draw'            => (int) ($req['draw'] ?? 0),
            'recordsTotal'    => $total,
            'recordsFiltered' => $filtered,
            'data'            => $rows,
        ];
    }

    public static function stats(array $scope): array
    {
        $pdo    = Db::pdo();
        $source = self::source();

        $where = '';
        $params = [];
        if (!empty($scope['project'])) {
            $where = 'WHERE project_name = :project';
            $params[':project'] = $scope['project'];
        }
        $andWhere = $where === '' ? 'WHERE' : $where . ' AND';

        $today = (int) self::scalar(
            $pdo,
            "SELECT COUNT(*) FROM $source $andWhere DATE(last_updated_time) = CURDATE()",
            $params
        );
        $week = (int) self::scalar(
            $pdo,
            "SELECT COUNT(*) FROM $source $andWhere last_updated_time >= DATE_SUB(NOW(), INTERVAL 7 DAY)",
            $params
        );
        $month = (int) self::scalar(
            $pdo,
            "SELECT COUNT(*) FROM $source $andWhere last_updated_time >= DATE_SUB(NOW(), INTERVAL 30 DAY)",
            $params
        );
        $total = (int) self::scalar($pdo, "SELECT COUNT(*) FROM $source $where", $params);

        $sourceSafe = "(PrimarySource IS NULL OR PrimarySource = ''"
                    . " OR (CHAR_LENGTH(PrimarySource) <= 50 AND PrimarySource REGEXP '^[A-Za-z0-9_ -]+$'))";
        $topWhere = $andWhere . ' ' . $sourceSafe;
        $topSources = self::all(
            $pdo,
            "SELECT COALESCE(NULLIF(PrimarySource,''),'(unknown)') AS source, COUNT(*) AS cnt
               FROM $source $topWhere
              GROUP BY source
              ORDER BY cnt DESC
              LIMIT 5",
            $params
        );

        return [
            'today'       => $today,
            'week'        => $week,
            'month'       => $month,
            'total'       => $total,
            'top_sources' => $topSources,
        ];
    }

    public static function distinctSources(array $scope): array
    {
        $pdo    = Db::pdo();
        $source = self::source();
        $where  = '';
        $params = [];
        if (!empty($scope['project'])) {
            $where = 'WHERE project_name = :project';
            $params[':project'] = $scope['project'];
        }
        $andWhere = $where === '' ? 'WHERE' : $where . ' AND';
        $rows = self::all(
            $pdo,
            "SELECT DISTINCT PrimarySource FROM $source
              $andWhere PrimarySource IS NOT NULL
                AND PrimarySource <> ''
                AND CHAR_LENGTH(PrimarySource) <= 50
                AND PrimarySource REGEXP '^[A-Za-z0-9_ -]+$'
              ORDER BY PrimarySource ASC LIMIT 50",
            $params
        );
        return array_column($rows, 'PrimarySource');
    }

    public static function distinctProjects(): array
    {
        $pdo    = Db::pdo();
        $source = self::source();
        $rows = self::all(
            $pdo,
            "SELECT DISTINCT project_name FROM $source
              WHERE project_name LIKE '%TVS Emerald%'
              ORDER BY project_name ASC LIMIT 100",
            []
        );
        return array_column($rows, 'project_name');
    }

    public static function exportCsv(array $scope, array $filters, $stream): void
    {
        $pdo    = Db::pdo();
        $source = self::source();

        if (!empty($scope['project'])) {
            $filters['project'] = $scope['project'];
        }

        [$whereSql, $params] = self::buildWhere($filters);

        $sql = "SELECT * FROM $source $whereSql ORDER BY last_updated_time DESC LIMIT 2000";
        $stmt = $pdo->prepare($sql);
        foreach ($params as $k => $v) $stmt->bindValue($k, $v);
        $stmt->execute();

        $headerWritten = false;
        while ($row = $stmt->fetch()) {
            if (!$headerWritten) {
                fputcsv($stream, array_keys($row));
                $headerWritten = true;
            }
            fputcsv($stream, $row);
        }
    }

    private static function scalar(PDO $pdo, string $sql, array $params)
    {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }

    private static function all(PDO $pdo, string $sql, array $params): array
    {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}

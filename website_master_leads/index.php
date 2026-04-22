<?php
declare(strict_types=1);

define('APP_BOOT', true);
require_once __DIR__ . '/src/bootstrap.php';

Auth::requireLogin();
$user    = Auth::user();
$isAdmin = Auth::isAdmin();
$appName = $GLOBALS['CONFIG']['app']['name'];
$scopeLabel = $isAdmin ? 'All Projects' : ($user['project'] ?? $user['username']);
?>
<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title><?= htmlspecialchars($appName) ?> · <?= htmlspecialchars($scopeLabel) ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- DataTables (jQuery) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = { darkMode: 'class', theme: { extend: { colors: {
        background: 'hsl(0 0% 100%)', foreground: 'hsl(222.2 47.4% 11.2%)',
        card: 'hsl(0 0% 100%)', 'card-foreground': 'hsl(222.2 47.4% 11.2%)',
        muted: 'hsl(210 40% 96.1%)', 'muted-foreground': 'hsl(215.4 16.3% 46.9%)',
        border: 'hsl(214.3 31.8% 91.4%)', input: 'hsl(214.3 31.8% 91.4%)',
        primary: 'hsl(222.2 47.4% 11.2%)', 'primary-foreground': 'hsl(210 40% 98%)',
        secondary: 'hsl(210 40% 96.1%)', 'secondary-foreground': 'hsl(222.2 47.4% 11.2%)',
        accent: 'hsl(210 40% 96.1%)', 'accent-foreground': 'hsl(222.2 47.4% 11.2%)',
        destructive: 'hsl(0 84.2% 60.2%)', 'destructive-foreground': 'hsl(210 40% 98%)',
        ring: 'hsl(215 20.2% 65.1%)',
      }, fontFamily: { sans: ['Inter','ui-sans-serif','system-ui'] }, borderRadius: { lg:'0.75rem', md:'0.5rem', sm:'0.25rem' } } } };
    </script>

    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body class="min-h-full bg-muted/40 font-sans text-foreground antialiased">

  <!-- Top bar -->
  <header class="sticky top-0 z-30 border-b border-border bg-white/80 backdrop-blur">
    <div class="mx-auto max-w-[1600px] px-6 h-14 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <img src="assets/img/logo-header.png" alt="TVS Emerald" class="h-8 w-auto">
        <div>
          <div class="text-sm font-semibold leading-tight"><?= htmlspecialchars($appName) ?></div>
          <div class="text-xs text-muted-foreground leading-tight"><?= htmlspecialchars($scopeLabel) ?></div>
        </div>
      </div>
      <div class="flex items-center gap-2">
        <span id="idleTimer" class="hidden sm:inline-flex items-center gap-1.5 h-9 px-3 rounded-md border border-border bg-white text-xs font-medium text-slate-600 tabular-nums" title="Session auto-logout timer">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12,6 12,12 16,14"/></svg>
          <span id="idleTimerValue">15:00</span>
        </span>
        <span class="hidden sm:inline text-sm text-muted-foreground mr-1"><?= htmlspecialchars($user['username']) ?></span>
        <a href="logout.php"
           class="inline-flex items-center gap-1.5 rounded-md bg-destructive px-3 h-9 text-sm font-medium text-destructive-foreground hover:bg-destructive/90 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
          Logout
        </a>
      </div>
    </div>
  </header>

  <main class="mx-auto max-w-[1600px] px-6 py-6 space-y-6">

    <!-- Summary cards -->
    <section class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <?php
        $cards = [
          ['today', 'Today',      'bg-blue-50  text-blue-700'],
          ['week',  'Last 7 days','bg-emerald-50 text-emerald-700'],
          ['month', 'Last 30 days','bg-amber-50 text-amber-700'],
          ['total', 'Total leads','bg-violet-50 text-violet-700'],
        ];
        foreach ($cards as [$key, $label, $tone]): ?>
          <div class="rounded-lg border border-border bg-card p-4 shadow-sm">
            <div class="text-xs font-medium text-muted-foreground uppercase tracking-wide"><?= $label ?></div>
            <div class="mt-2 flex items-baseline gap-2">
              <span id="stat-<?= $key ?>" class="text-2xl font-semibold">—</span>
              <span class="text-xs inline-flex items-center rounded-full px-2 py-0.5 <?= $tone ?>"><?= $label ?></span>
            </div>
          </div>
      <?php endforeach; ?>
    </section>

    <!-- Top sources -->
    <section class="rounded-lg border border-border bg-card p-4 shadow-sm">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-sm font-semibold">Top primary sources</h2>
        <span class="text-xs text-muted-foreground">Based on current scope</span>
      </div>
      <div id="topSources" class="flex flex-wrap gap-2 text-xs text-muted-foreground">Loading…</div>
    </section>

    <!-- Filters -->
    <section class="rounded-lg border border-border bg-card p-4 shadow-sm">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-sm font-semibold">Filters</h2>
        <button id="resetFilters" class="text-xs text-muted-foreground hover:underline">Reset</button>
      </div>
      <form id="filters" class="grid grid-cols-1 <?= $isAdmin ? 'md:grid-cols-6' : 'md:grid-cols-5' ?> gap-3">
        <div class="md:col-span-2">
          <label class="block text-xs font-medium mb-1">Search</label>
          <input name="search" type="text" placeholder="Name, email, phone, campaign…"
                 class="w-full h-9 rounded-md border border-input bg-white px-3 text-sm focus:outline-none focus:ring-2 focus:ring-ring">
        </div>
        <div>
          <label class="block text-xs font-medium mb-1">From</label>
          <input name="date_from" type="date" class="w-full h-9 rounded-md border border-input bg-white px-3 text-sm focus:outline-none focus:ring-2 focus:ring-ring">
        </div>
        <div>
          <label class="block text-xs font-medium mb-1">To</label>
          <input name="date_to" type="date" class="w-full h-9 rounded-md border border-input bg-white px-3 text-sm focus:outline-none focus:ring-2 focus:ring-ring">
        </div>
        <?php if ($isAdmin): ?>
        <div>
          <label class="block text-xs font-medium mb-1">Project</label>
          <select name="project" id="projectFilter"
                  class="w-full h-9 rounded-md border border-input bg-white px-3 text-sm focus:outline-none focus:ring-2 focus:ring-ring">
            <option value="">All projects</option>
          </select>
        </div>
        <?php endif; ?>
        <div>
          <label class="block text-xs font-medium mb-1">Primary source</label>
          <select name="source" id="sourceFilter"
                  class="w-full h-9 rounded-md border border-input bg-white px-3 text-sm focus:outline-none focus:ring-2 focus:ring-ring">
            <option value="">All sources</option>
          </select>
        </div>
        <div class="md:col-span-full flex items-end gap-2">
          <button type="button" id="applyFilters"
                  class="h-9 px-4 rounded-md bg-primary text-primary-foreground text-sm font-medium hover:bg-primary/90 transition">Apply</button>
          <?php if ($isAdmin): ?>
            <a id="exportCsv" href="api/export.php"
               class="h-9 px-4 inline-flex items-center rounded-md border border-border bg-white text-sm hover:bg-accent transition">Export CSV</a>
          <?php endif; ?>
        </div>
      </form>
    </section>

    <!-- Leads table -->
    <section class="rounded-lg border border-border bg-card shadow-sm overflow-hidden">
      <div class="p-4 border-b border-border flex items-center justify-between">
        <h2 class="text-sm font-semibold">Leads</h2>
        <span id="rowHint" class="text-xs text-muted-foreground"></span>
      </div>
      <div class="p-4 overflow-x-auto">
        <table id="leads_table" class="display stripe row-border hover w-full text-sm">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Project</th>
              <th>Device</th>
              <th>City</th>
              <th>Date</th>
            </tr>
          </thead>
        </table>
      </div>
    </section>
  </main>

  <!-- Row detail modal -->
  <div id="rowModal" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-150">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" data-close></div>
    <div class="relative mx-auto mt-8 mb-8 max-w-4xl rounded-2xl bg-white shadow-2xl ring-1 ring-slate-900/5 overflow-hidden">
      <button data-close class="absolute top-4 right-4 z-10 h-9 w-9 inline-flex items-center justify-center rounded-full bg-white border border-border text-muted-foreground hover:bg-destructive hover:text-destructive-foreground hover:border-destructive transition shadow-sm" aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
      <div id="rowHero" class="bg-gradient-to-br from-slate-50 via-white to-slate-50 border-b border-border px-6 py-5"></div>
      <div id="rowBody" class="px-6 py-6 max-h-[calc(100vh-16rem)] overflow-y-auto space-y-6"></div>
      <div id="rowFooter" class="border-t border-border bg-muted/40 px-6 py-3 flex items-center justify-between text-xs text-muted-foreground"></div>
    </div>
  </div>

  <script>
    window.APP_SESSION = {
      loginAt:  <?= (int) ($user['login_at'] ?? time()) ?>,
      lifetime: <?= (int) $GLOBALS['CONFIG']['session']['lifetime'] ?>,
      now:      <?= time() ?>
    };
    window.APP_LEADS = <?= json_encode([
      'pageSizeDefault' => (int) $GLOBALS['CONFIG']['leads']['page_size_default'],
      'pageSizeOptions' => array_values(array_map('intval', $GLOBALS['CONFIG']['leads']['page_size_options'])),
    ], JSON_UNESCAPED_SLASHES) ?>;
  </script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/app.js"></script>
</body>
</html>

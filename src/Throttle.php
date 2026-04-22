<?php
declare(strict_types=1);

if (!defined('APP_BOOT')) { http_response_code(403); exit('Forbidden'); }

/**
 * Simple file-based login throttle. Keyed by IP + username.
 */
final class Throttle
{
    private static function dir(): string
    {
        $d = dirname(__DIR__) . '/storage/throttle';
        if (!is_dir($d)) @mkdir($d, 0775, true);
        return $d;
    }

    private static function file(string $key): string
    {
        return self::dir() . '/' . sha1($key) . '.json';
    }

    public static function check(string $key): array
    {
        $cfg = $GLOBALS['CONFIG']['throttle'];
        $max  = $cfg['max_attempts'];
        $lock = $cfg['lockout_minutes'] * 60;

        $file = self::file($key);
        if (!is_file($file)) {
            return ['locked' => false, 'remaining' => $max];
        }
        $data = json_decode((string) file_get_contents($file), true) ?: ['count' => 0, 'first' => time()];

        if ($data['count'] >= $max && (time() - $data['first']) < $lock) {
            $wait = $lock - (time() - $data['first']);
            return ['locked' => true, 'wait_seconds' => $wait];
        }

        if ((time() - $data['first']) >= $lock) {
            @unlink($file);
            return ['locked' => false, 'remaining' => $max];
        }

        return ['locked' => false, 'remaining' => max(0, $max - $data['count'])];
    }

    public static function hit(string $key): void
    {
        $file = self::file($key);
        $data = is_file($file)
            ? (json_decode((string) file_get_contents($file), true) ?: ['count' => 0, 'first' => time()])
            : ['count' => 0, 'first' => time()];
        $data['count']++;
        @file_put_contents($file, json_encode($data));
    }

    public static function clear(string $key): void
    {
        @unlink(self::file($key));
    }
}

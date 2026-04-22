<?php
declare(strict_types=1);

if (!defined('APP_BOOT')) { http_response_code(403); exit('Forbidden'); }

final class Auth
{
    public static function users(): array
    {
        static $users = null;
        if ($users === null) {
            $users = require dirname(__DIR__) . '/config/users.php';
        }
        return $users;
    }

    public static function attempt(string $username, string $password): bool
    {
        $users = self::users();
        if (!isset($users[$username])) {
            return false;
        }
        return password_verify($password, $users[$username]['password_hash']);
    }

    public static function login(string $username): void
    {
        $users = self::users();
        session_regenerate_id(true);
        $_SESSION['user'] = [
            'username' => $username,
            'role'     => $users[$username]['role'],
            'project'  => $users[$username]['project'],
            'login_at' => time(),
        ];
    }

    public static function check(): bool
    {
        if (empty($_SESSION['user']['username'])) return false;

        $lifetime = $GLOBALS['CONFIG']['session']['lifetime'];
        if ((time() - ($_SESSION['user']['login_at'] ?? 0)) > $lifetime) {
            self::logout();
            return false;
        }
        return true;
    }

    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    public static function isAdmin(): bool
    {
        return (self::user()['role'] ?? null) === 'admin';
    }

    public static function requireLogin(): void
    {
        if (!self::check()) {
            header('Location: login.php');
            exit;
        }
    }

    public static function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $p['path'], $p['domain'], $p['secure'], $p['httponly']);
        }
        session_destroy();
    }
}

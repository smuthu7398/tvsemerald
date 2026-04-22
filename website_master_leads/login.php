<?php
declare(strict_types=1);

define('APP_BOOT', true);
require_once __DIR__ . '/src/bootstrap.php';

if (Auth::check()) {
    header('Location: index.php');
    exit;
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::check($_POST['_csrf'] ?? null)) {
        $error = 'Your session expired. Please try again.';
    } else {
        $username = trim((string) ($_POST['username'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');

        $key   = ($_SERVER['REMOTE_ADDR'] ?? 'cli') . '|' . strtolower($username);
        $state = Throttle::check($key);

        if ($state['locked']) {
            $error = 'Too many attempts. Try again in ' . ceil($state['wait_seconds'] / 60) . ' minute(s).';
        } elseif (Auth::attempt($username, $password)) {
            Throttle::clear($key);
            Auth::login($username);
            header('Location: index.php');
            exit;
        } else {
            Throttle::hit($key);
            // Generic message — don't reveal which field was wrong
            $error = 'Invalid credentials.';
            usleep(400000); // 0.4s constant-time-ish delay
        }
    }
}

$users = Auth::users();
?>
<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Sign in · <?= htmlspecialchars($GLOBALS['CONFIG']['app']['name']) ?></title>
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = { darkMode: 'class', theme: { extend: { colors: {
        background: 'hsl(0 0% 100%)', foreground: 'hsl(222.2 47.4% 11.2%)',
        muted: 'hsl(210 40% 96.1%)', 'muted-foreground': 'hsl(215.4 16.3% 46.9%)',
        border: 'hsl(214.3 31.8% 91.4%)', input: 'hsl(214.3 31.8% 91.4%)',
        primary: 'hsl(222.2 47.4% 11.2%)', 'primary-foreground': 'hsl(210 40% 98%)',
        destructive: 'hsl(0 84.2% 60.2%)', 'destructive-foreground': 'hsl(210 40% 98%)',
        ring: 'hsl(215 20.2% 65.1%)',
      }, fontFamily: { sans: ['Inter','ui-sans-serif','system-ui'] }, borderRadius: { lg:'0.75rem', md:'0.5rem', sm:'0.25rem' } } } };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-full bg-gradient-to-br from-slate-50 to-slate-200 font-sans text-foreground antialiased">
  <div class="min-h-screen flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-md">
      <div class="mb-8 text-center">
        <img src="assets/img/logo-header.png" alt="TVS Emerald" class="mx-auto mb-3 h-12 w-auto">
        <h1 class="text-2xl font-semibold tracking-tight"><?= htmlspecialchars($GLOBALS['CONFIG']['app']['name']) ?></h1>
        <p class="text-sm text-muted-foreground mt-1">Sign in to view enquiry leads</p>
      </div>

      <div class="rounded-lg border border-border bg-white shadow-sm p-6">
        <?php if ($error): ?>
          <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <form method="post" action="" autocomplete="off" class="space-y-4">
          <?= Csrf::field() ?>

          <div>
            <label class="block text-sm font-medium mb-1.5" for="username">Account</label>
            <select id="username" name="username" required
                    class="w-full h-10 rounded-md border border-input bg-white px-3 text-sm focus:outline-none focus:ring-2 focus:ring-ring">
              <option value="">Select account…</option>
              <?php foreach (array_keys($users) as $u): ?>
                <option value="<?= htmlspecialchars($u) ?>" <?= (($_POST['username'] ?? '') === $u) ? 'selected' : '' ?>>
                  <?= htmlspecialchars($u === 'admin' ? 'All Projects (admin)' : ($users[$u]['project'] ?? $u)) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1.5" for="password">Password</label>
            <input id="password" name="password" type="password" required
                   class="w-full h-10 rounded-md border border-input bg-white px-3 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                   placeholder="••••••••">
          </div>

          <button type="submit"
                  class="w-full h-10 rounded-md bg-primary text-primary-foreground text-sm font-medium hover:bg-primary/90 transition">
            Sign in
          </button>
        </form>
      </div>

      <p class="mt-6 text-center text-xs text-muted-foreground">
        &copy; <?= date('Y') ?> TVS Emerald · Internal use only
      </p>
    </div>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | SimplePOS</title>
    <style>
        :root {
            --navy: #111827;
            --blue: #4f46e5;
            --blue-dark: #3730a3;
            --blue-soft: #eef2ff;
            --ink: #172033;
            --muted: #667085;
            --line: #e4e7ec;
            --surface: #ffffff;
            --background: #f8f9fc;
            --success: #067647;
            --success-soft: #ecfdf3;
            --danger: #b42318;
            --danger-soft: #fef3f2;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background:
                radial-gradient(circle at 10% 0%, rgba(79, 70, 229, .08), transparent 28rem),
                var(--background);
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.6;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 20;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
            background: rgba(17, 24, 39, .96);
            color: white;
            backdrop-filter: blur(12px);
        }

        .nav-wrap {
            width: min(1100px, calc(100% - 2rem));
            min-height: 74px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .brand { color: white; font-size: 1.3rem; font-weight: 850; letter-spacing: -.03em; text-decoration: none; }
        .brand span { color: #a5b4fc; }
        nav { display: flex; flex-wrap: wrap; gap: .35rem; }

        nav a {
            padding: .55rem .8rem;
            border-radius: .65rem;
            color: #cbd5e1;
            font-size: .93rem;
            font-weight: 600;
            text-decoration: none;
        }

        nav a:hover, nav a.active { background: rgba(255, 255, 255, .1); color: white; }

        main { width: min(1120px, calc(100% - 2rem)); min-height: calc(100vh - 145px); margin: 0 auto; padding: 3.5rem 0 4.5rem; }

        .eyebrow { margin: 0 0 .5rem; color: var(--blue); font-size: .8rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
        h1 { margin: 0; color: var(--navy); font-size: clamp(2rem, 5vw, 3.5rem); line-height: 1.1; }
        h2 { margin: 0 0 .45rem; color: var(--navy); }
        .lead { max-width: 720px; margin: 1rem 0 0; color: var(--muted); font-size: 1.05rem; }
        .page-heading { display: flex; align-items: flex-end; justify-content: space-between; gap: 1.5rem; }

        .hero {
            padding: clamp(2rem, 6vw, 5rem);
            border: 1px solid var(--line);
            border-radius: 1.75rem;
            background: linear-gradient(135deg, #fff 0%, #eef2ff 72%, #e0e7ff 100%);
            box-shadow: 0 22px 55px rgba(17, 24, 39, .09);
        }

        .actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1.75rem; }
        .button { display: inline-flex; align-items: center; justify-content: center; gap: .4rem; padding: .78rem 1.05rem; border: 0; border-radius: .72rem; background: var(--blue); color: white; font: inherit; font-weight: 750; text-decoration: none; cursor: pointer; box-shadow: 0 5px 14px rgba(79, 70, 229, .2); transition: transform .15s ease, background .15s ease; }
        .button:hover { background: var(--blue-dark); transform: translateY(-1px); }
        .button.secondary { border: 1px solid var(--line); background: white; color: var(--navy); }
        .button.secondary:hover { background: #f9fafb; }
        .button.small { padding: .48rem .72rem; font-size: .85rem; box-shadow: none; }

        .grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-top: 1.5rem; }
        .card, .table-card, .form-card { border: 1px solid var(--line); border-radius: 1.1rem; background: var(--surface); box-shadow: 0 10px 32px rgba(17, 24, 39, .055); }
        .card { padding: 1.4rem; }
        .card p { margin: 0; color: var(--muted); }
        .table-card { margin-top: 1.75rem; overflow-x: auto; }

        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 1rem 1.2rem; border-bottom: 1px solid var(--line); text-align: left; vertical-align: middle; white-space: nowrap; }
        th { background: #f9fafb; color: var(--muted); font-size: .74rem; letter-spacing: .08em; text-transform: uppercase; }
        tbody tr:last-child td { border-bottom: 0; }
        tbody tr:hover { background: #fafcff; }
        .badge { display: inline-block; padding: .25rem .55rem; border-radius: 999px; background: var(--blue-soft); color: #2459c6; font-size: .8rem; font-weight: 700; }

        .avatar { width: 48px; height: 48px; border: 2px solid white; border-radius: 50%; background: #eef2ff; object-fit: cover; box-shadow: 0 0 0 1px var(--line), 0 4px 12px rgba(17, 24, 39, .12); }
        .person { display: flex; align-items: center; gap: .8rem; }
        .empty-state { padding: 3rem 1rem; color: var(--muted); text-align: center; }

        .form-card { max-width: 720px; margin-top: 1.75rem; padding: clamp(1.4rem, 4vw, 2.25rem); }
        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.2rem; }
        .field { display: flex; flex-direction: column; gap: .42rem; }
        .field.full { grid-column: 1 / -1; }
        label { color: var(--navy); font-size: .9rem; font-weight: 750; }
        input[type="text"], input[type="email"], input[type="password"], input[type="file"] { width: 100%; padding: .78rem .9rem; border: 1px solid #d0d5dd; border-radius: .7rem; background: white; color: var(--ink); font: inherit; outline: none; transition: border .15s ease, box-shadow .15s ease; }
        input:focus { border-color: #818cf8; box-shadow: 0 0 0 4px rgba(99, 102, 241, .12); }
        .hint { margin: 0; color: var(--muted); font-size: .82rem; }
        .form-actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1.5rem; }
        .errors, .flash { margin: 0 0 1.5rem; padding: 1rem 1.1rem; border: 1px solid; border-radius: .85rem; }
        .errors { border-color: #fecdca; background: var(--danger-soft); color: var(--danger); }
        .errors strong { display: block; margin-bottom: .25rem; }
        .errors ul { margin: .35rem 0 0; padding-left: 1.25rem; }
        .flash { border-color: #abefc6; background: var(--success-soft); color: var(--success); font-weight: 700; }
        .current-avatar { display: flex; align-items: center; gap: .85rem; padding: .8rem; border: 1px solid var(--line); border-radius: .8rem; background: #f9fafb; }
        .nav-user { display: flex; align-items: center; gap: .7rem; margin-left: .35rem; }
        .user-name { color: #e0e7ff; font-size: .85rem; font-weight: 700; }
        .logout-form { margin: 0; }
        .logout-button { padding: .48rem .72rem; border: 1px solid rgba(255, 255, 255, .18); border-radius: .6rem; background: transparent; color: white; font: inherit; font-size: .85rem; font-weight: 700; cursor: pointer; }
        .logout-button:hover { background: rgba(255, 255, 255, .1); }
        .login-shell { display: grid; grid-template-columns: 1.1fr .9fr; align-items: center; gap: clamp(2rem, 7vw, 6rem); min-height: 60vh; }
        .login-card { margin-top: 0; }
        .one-column { grid-template-columns: 1fr; }
        .login-button { width: 100%; margin-top: 1.5rem; }

        footer { padding: 1.4rem 1rem; border-top: 1px solid var(--line); color: var(--muted); text-align: center; font-size: .85rem; }

        @media (max-width: 720px) {
            .nav-wrap { align-items: flex-start; flex-direction: column; gap: .5rem; padding: 1rem 0; }
            nav { width: 100%; }
            main { padding: 2rem 0; }
            .grid { grid-template-columns: 1fr; }
            .page-heading { align-items: flex-start; flex-direction: column; }
            .form-grid { grid-template-columns: 1fr; }
            .field.full { grid-column: auto; }
            .login-shell { grid-template-columns: 1fr; min-height: auto; }
            .nav-user { width: 100%; justify-content: space-between; margin: .35rem 0 0; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="nav-wrap">
            <a class="brand" href="<?= site_url('/') ?>">Simple<span>POS</span></a>
            <nav aria-label="Main navigation">
                <a class="<?= url_is('/') ? 'active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
                <a class="<?= url_is('about') ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
                <?php if (session()->get('isLoggedIn')): ?>
                    <a class="<?= url_is('customers*') ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
                    <a class="<?= url_is('users*') ? 'active' : '' ?>" href="<?= site_url('users') ?>">Users</a>
                    <span class="nav-user">
                        <span class="user-name"><?= esc(session('fullName')) ?></span>
                        <form class="logout-form" action="<?= site_url('logout') ?>" method="post">
                            <?= csrf_field() ?>
                            <button class="logout-button" type="submit">Log out</button>
                        </form>
                    </span>
                <?php else: ?>
                    <a class="<?= url_is('login') ? 'active' : '' ?>" href="<?= site_url('login') ?>">Login</a>
                <?php endif ?>
            </nav>
        </div>
    </header>

    <main>
        <?php if ($message = session()->getFlashdata('success')): ?>
            <div class="flash" role="status"><?= esc($message) ?></div>
        <?php endif ?>

        <?php if ($message = session()->getFlashdata('error')): ?>
            <div class="errors" role="alert"><?= esc($message) ?></div>
        <?php endif ?>

        <?= $this->renderSection('content') ?>
    </main>

    <footer>SimplePOS &copy; <?= date('Y') ?> &mdash; CodeIgniter 4 Laboratory Activity</footer>
</body>
</html>

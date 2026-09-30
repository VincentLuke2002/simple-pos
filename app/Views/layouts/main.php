<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | SimplePOS</title>
    <style>
        :root {
            --navy: #17213b;
            --blue: #2f6fed;
            --blue-soft: #eaf0ff;
            --ink: #1e293b;
            --muted: #64748b;
            --line: #e2e8f0;
            --surface: #ffffff;
            --background: #f5f7fb;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--background);
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.6;
        }

        .site-header { background: var(--navy); color: white; }

        .nav-wrap {
            width: min(1100px, calc(100% - 2rem));
            min-height: 72px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .brand { color: white; font-size: 1.25rem; font-weight: 800; text-decoration: none; }
        .brand span { color: #7da2ff; }
        nav { display: flex; flex-wrap: wrap; gap: .35rem; }

        nav a {
            padding: .55rem .8rem;
            border-radius: .55rem;
            color: #cbd5e1;
            font-size: .93rem;
            font-weight: 600;
            text-decoration: none;
        }

        nav a:hover, nav a.active { background: rgba(255, 255, 255, .1); color: white; }

        main { width: min(1100px, calc(100% - 2rem)); min-height: calc(100vh - 145px); margin: 0 auto; padding: 3.5rem 0; }

        .eyebrow { margin: 0 0 .5rem; color: var(--blue); font-size: .8rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
        h1 { margin: 0; color: var(--navy); font-size: clamp(2rem, 5vw, 3.5rem); line-height: 1.1; }
        h2 { margin: 0 0 .45rem; color: var(--navy); }
        .lead { max-width: 700px; margin: 1rem 0 0; color: var(--muted); font-size: 1.08rem; }

        .hero {
            padding: clamp(2rem, 6vw, 5rem);
            border: 1px solid var(--line);
            border-radius: 1.5rem;
            background: linear-gradient(135deg, #fff 0%, var(--blue-soft) 100%);
            box-shadow: 0 18px 45px rgba(23, 33, 59, .08);
        }

        .actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1.75rem; }
        .button { display: inline-block; padding: .75rem 1rem; border-radius: .65rem; background: var(--blue); color: white; font-weight: 700; text-decoration: none; }
        .button.secondary { border: 1px solid var(--line); background: white; color: var(--navy); }

        .grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-top: 1.5rem; }
        .card, .table-card { border: 1px solid var(--line); border-radius: 1rem; background: var(--surface); box-shadow: 0 8px 28px rgba(23, 33, 59, .05); }
        .card { padding: 1.4rem; }
        .card p { margin: 0; color: var(--muted); }
        .table-card { margin-top: 1.5rem; overflow-x: auto; }

        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 1rem 1.2rem; border-bottom: 1px solid var(--line); text-align: left; white-space: nowrap; }
        th { background: #f8fafc; color: var(--muted); font-size: .75rem; letter-spacing: .08em; text-transform: uppercase; }
        tbody tr:last-child td { border-bottom: 0; }
        tbody tr:hover { background: #fafcff; }
        .badge { display: inline-block; padding: .25rem .55rem; border-radius: 999px; background: var(--blue-soft); color: #2459c6; font-size: .8rem; font-weight: 700; }

        footer { padding: 1.4rem 1rem; border-top: 1px solid var(--line); color: var(--muted); text-align: center; font-size: .85rem; }

        @media (max-width: 720px) {
            .nav-wrap { align-items: flex-start; flex-direction: column; gap: .5rem; padding: 1rem 0; }
            nav { width: 100%; }
            main { padding: 2rem 0; }
            .grid { grid-template-columns: 1fr; }
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
                <a class="<?= url_is('customers') ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
                <a class="<?= url_is('users') ? 'active' : '' ?>" href="<?= site_url('users') ?>">Users</a>
            </nav>
        </div>
    </header>

    <main><?= $this->renderSection('content') ?></main>

    <footer>SimplePOS &copy; <?= date('Y') ?> &mdash; CodeIgniter 4 Laboratory Activity</footer>
</body>
</html>


<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="login-shell">
    <div class="login-copy">
        <p class="eyebrow">Staff access</p>
        <h1>Welcome back</h1>
        <p class="lead">Log in with your staff account to manage customers and users.</p>
    </div>

    <div class="form-card login-card">
        <?php if ($errors = session('errors')): ?>
            <div class="errors" role="alert">
                <strong>Please check the form.</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form action="<?= site_url('login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-grid one-column">
                <div class="field">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" value="<?= esc(old('username'), 'attr') ?>" autocomplete="username" required autofocus>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required>
                </div>
            </div>
            <button class="button login-button" type="submit">Log in</button>
        </form>
    </div>
</section>
<?= $this->endSection() ?>

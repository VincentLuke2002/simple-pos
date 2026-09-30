<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="hero">
    <p class="eyebrow">Point-of-Sale Foundations</p>
    <h1>Welcome to SimplePOS</h1>
    <p class="lead">A lightweight starting point for managing customer and staff accounts, now backed by a persistent MySQL database and CodeIgniter Models.</p>
    <div class="actions">
        <a class="button" href="<?= site_url('customers') ?>">View customers</a>
        <a class="button secondary" href="<?= site_url('users') ?>">View users</a>
    </div>
</section>
<?= $this->endSection() ?>

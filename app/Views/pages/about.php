<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">About the project</p>
<h1>Built for the first POS milestone</h1>
<p class="lead">SimplePOS demonstrates CodeIgniter routing, controllers, Models, views, shared navigation, and database-backed records.</p>

<div class="grid">
    <article class="card">
        <h2>Four routes</h2>
        <p>Home, about, customer accounts, and user accounts are each available through a clean URL.</p>
    </article>
    <article class="card">
        <h2>MVC structure</h2>
        <p>Controllers prepare page data while views focus on displaying clean, readable content.</p>
    </article>
    <article class="card">
        <h2>MySQL persistence</h2>
        <p>Customer and staff records come from MySQL through CodeIgniter Models and are displayed with foreach loops.</p>
    </article>
</div>
<?= $this->endSection() ?>

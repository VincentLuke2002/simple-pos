<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">Accounts</p>
<h1>User Accounts</h1>
<p class="lead">These staff records are retrieved from the MySQL database through the UserModel.</p>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Full name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><strong><?= esc($user['username']) ?></strong></td>
                    <td><?= esc($user['full_name']) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>

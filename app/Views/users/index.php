<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div>
        <p class="eyebrow">Accounts</p>
        <h1>User Accounts</h1>
        <p class="lead">Manage staff profiles, usernames, and display-ready avatars.</p>
    </div>
    <a class="button" href="<?= site_url('users/new') ?>">+ New user</a>
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Full name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <?php
                        $avatar = ! empty($user['avatar'])
                            && is_file(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . $user['avatar'])
                            ? $user['avatar']
                            : 'placeholder.svg';
                    ?>
                    <td>
                        <div class="person">
                            <img class="avatar" src="<?= base_url('uploads/avatars/' . rawurlencode($avatar)) ?>" alt="<?= esc($user['full_name']) ?> avatar">
                            <strong><?= esc($user['username']) ?></strong>
                        </div>
                    </td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><a class="button secondary small" href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td>
                </tr>
            <?php endforeach ?>
            <?php if ($users === []): ?>
                <tr><td class="empty-state" colspan="3">No user accounts yet.</td></tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div>
        <p class="eyebrow">Accounts</p>
        <h1>Customer Accounts</h1>
        <p class="lead">Create, review, and update customer contact information.</p>
    </div>
    <a class="button" href="<?= site_url('customers/new') ?>">+ New customer</a>
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Full name</th>
                <th>Email address</th>
                <th>Phone number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><strong><?= esc($customer['full_name']) ?></strong></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                    <td><a class="button secondary small" href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
                </tr>
            <?php endforeach ?>
            <?php if ($customers === []): ?>
                <tr><td class="empty-state" colspan="4">No customer accounts yet.</td></tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>

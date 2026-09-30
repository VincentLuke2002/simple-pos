<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">Accounts</p>
<h1>Customer Accounts</h1>
<p class="lead">These customer records are retrieved from the MySQL database through the CustomerModel.</p>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Full name</th>
                <th>Email address</th>
                <th>Phone number</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><strong><?= esc($customer['full_name']) ?></strong></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>

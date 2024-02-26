<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer</title>
    <link rel="stylesheet" href="<?= ROOT_PATH ?>css/style.css">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
    />
</head>

<body>
<div class="my-3">
    <?php if (!empty($message)) : ?>
        <div class="alert alert-success"><?= $message ?? '' ?></div>
    <?php endif; ?>
</div>
<table border="1">
    <tr>
        <th>#ID</th>
        <th>FullName</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th><a href="<?= ROOT_PATH ?>create">Thêm mới</a></th>
    </tr>
    <?php if (!empty($customers)) : ?>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?= $customer->id ?></td>
                <td><?= $customer->fullname ?></td>
                <td><?= $customer->email ?></td>
                <td>
                    <?= $customer->phone ?>
                </td>
                <td><?= $customer->address ?></td>
                <td>
                    <a href="<?= ROOT_PATH ?>edit?id=<?= $customer->id ?>">Update</a>
                    <a onclick="return confirm('Bạn có muốn xóa vĩnh viễn khách hàng không?')"
                       href="<?= ROOT_PATH ?>delete?id=<?= $customer->id ?>" class="delete">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    <?php endif; ?>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src=""></script>
</body>
</html>
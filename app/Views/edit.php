<!doctype html >
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http - equiv="X-UA-Compatible" content="ie=edge"/>
    <title> Minh Le </title>
    <link
            rel="icon"
            type="image/png"
            sizes="56x56"
            href="https://i.imgur.com/GqNWn2z.png"
    />
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
    />
    <link rel="stylesheet" href=""/>
</head>
<body>
<div class="container">
    <div class="my-3">
        <h1>Cập nhật thông tin khách hàng</h1>
    </div>
    <div class="my-3">
        <a class="btn btn-success" href="<?= ROOT_PATH ?>">Quay lại danh sách</a>
    </div>
    <div class="my-3">
        <?php if (!empty($message)) : ?>
            <div class="alert alert-success"><?= $message ?? '' ?></div>
        <?php endif; ?>
    </div>
    <div class="my-3">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="my-3">
                <label for="">Full Name</label>
                <input type="text" name="fullname" class="form-control"
                       value="<?= $data['fullname'] ?? $customer->fullname ?? "" ?>">
                <span class="text-danger"><?= $errors['fullname'] ?? "" ?></span>
            </div>
            <div class="my-3">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control"
                       value="<?= $data['email'] ?? $customer->email ?? "" ?>">
                <span class="text-danger"><?= $errors['email'] ?? "" ?></span>
            </div>
            <div class="my-3">
                <label for="">Phone</label>
                <input type="number" name="phone" class="form-control"
                       value="<?= $data['phone'] ?? $customer->phone ?? "" ?>">
                <span class="text-danger"><?= $errors['phone'] ?? "" ?></span>
            </div>
            <div class="my-3">
                <label for="">Address</label>
                <textarea name="address" id="" cols="30" rows="10"
                          class="form-control"><?= $data['address'] ?? $customer->address ?? "" ?></textarea>
                <span class="text-danger"><?= $errors['address'] ?? "" ?></span>
            </div>
            <input type="hidden" class="" name="id" value="<?= $customer->id ?>">
            <button class="btn btn-primary" type="submit">Lưu</button>
        </form>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src=""></script>
</body>
</html>

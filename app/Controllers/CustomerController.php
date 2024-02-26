<?php

namespace App\Controllers;

use App\Interfaces\InterfaceCrud;
use App\Models\CustomerModel;

class CustomerController extends BaseController implements InterfaceCrud
{
    public function index()
    {
        return $this->view("list", [
            "customers" => CustomerModel::all(),
            "message"   => $_COOKIE['message'] ?? ''
        ]);
    }

    public function create()
    {
        return $this->view("add");
    }

    public function store()
    {
        $data = $_POST;
        $errors = $this->validate($data);

        if ($errors) {
            return $this->view("add", [
                "data"   => $data,
                "errors" => $errors
            ]);
        }

        CustomerModel::insert($data);
        setcookie("message", "Bạn đã thêm khách hàng mới thành công", time() + 3);
        redirect("");
    }

    public function edit()
    {
        return $this->view("edit", [
            "customer" => CustomerModel::find($_GET['id']),
            "message"  => $_COOKIE['message'] ?? ''
        ]);
    }

    public function update()
    {
        $data = $_POST;
        $errors = $this->validate($data);

        if ($errors) {
            return $this->view("edit", [
                "data"     => $data,
                "errors"   => $errors,
                "customer" => CustomerModel::find($_GET['id'])
            ]);
        }

        CustomerModel::update($data['id'], $data);
        setcookie("message", "Bạn đã cập nhật thông tin khách hàng mới thành công", time() + 3);
        redirect("edit?id=" . $data['id']);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            CustomerModel::delete($_GET['id']);
            setcookie("message", "Bạn đã xóa khách hàng mới thành công", time() + 3);
            redirect("");
        }
    }

    private function validate($data)
    {
        $errors = [];

        if (empty($data['fullname'])) {
            $errors['fullname'] = "Tên không được để trống";
        }

        if (empty($data['email'])) {
            $errors['email'] = "Email không được để trống";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email không đúng định dạng";
        }

        if (empty($data['phone'])) {
            $errors['phone'] = "Số điện thọại không được để trống";
        } elseif (!preg_match("/^0\d{9}$/", $data['phone'])) {
            $errors['phone'] = "Số điện thoại phải là số, có 10 chữ số và bắt đầu bằng số 0";
        }

        if (empty($data['address'])) {
            $errors['address'] = "Địa chỉ không được để trống";
        }

        return $errors;
    }
}
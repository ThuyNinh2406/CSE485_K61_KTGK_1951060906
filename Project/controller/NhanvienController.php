<?php
session_start();
require_once 'models/NhanvienModel.php';
class NhanvienController{
    function index(){
        $NvModal = new NhanvienModal();
        $nv = $NvModal->getAllBD();
        require_once 'views/Nhanvien/index.php';
    }
    function admin(){
        $NvModal = new NhanvienModal();
        $nv = $NvModal->getAllBD();
        require_once 'views/Nhanvien/admin.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
            $hovaten = $_POST['hovaten'];
            $chucvu = $_POST['chucvu'];
            $phongban = $_POST['phongban'];
            $luong = $_POST['luong'];
            $ngayvaolam = $_POST['ngayvaolam'];
            if(empty($hovaten) || empty($chucvu)|| empty($phongban) || !is_numeric($luong) || empty($ngayvaolam)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $NvModal = new NhanvienModal();
                $nvArr = [
                    'hovaten' => $hovaten,
                    'chucvu' => $chucvu,
                    'phongban' => $phongban,
                    'luong' => $luong,
                    'ngayvaolam' => $ngayvaolam,
                ];
                $isAdd = $NvModal->insert($nvArr);
                if ($isAdd) {
                    $_SESSION['success'] = "Thêm thành công";
                    header("Location: index.php?controller=nhanvien&action=admin");
                }
                else {
                    $_SESSION['error'] = "Thêm thất bại";
                    header("Location: index.php?controller=nhanvien&action=error");
                }
                exit();
            }
        }
        require_once 'views/Nhanvien/add.php';
    }
    function edit(){
        if (!isset($_GET['manv'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=nhanvien&action=admin");
            return;
        }
        if (!is_numeric($_GET['manv'])) {
            $_SESSION['error'] = "Mã nhân viên phải là số";
            header("Location: index.php?controller=nhanvien&action=admin");
            return;
        }
        $manv = $_GET['manv'];
        $NvModal = new NhanvienModal();
        $nv = $NvModal->getBDById($manv);
        $error = '';
        if (isset($_POST['submit'])) {
            $hovaten = $_POST['hovaten'];
            $chucvu = $_POST['chucvu'];
            $phongban = $_POST['phongban'];
            $luong = $_POST['luong'];
            $ngayvaolam = $_POST['ngayvaolam'];
            if(empty($hovaten) || empty($chucvu)|| empty($phongban) || !is_numeric($luong) || empty($ngayvaolam)){
                $error = 'Thông tin chưa đầy đủ!';
            }
            else{
                $NvModal = new NhanvienModal();
                $nvArr = [
                    'maNV' => $manv,
                    'hovaten' => $hovaten,
                    'chucvu' => $chucvu,
                    'phongban' => $phongban,
                    'luong' => $luong,
                    'ngayvaolam' => $ngayvaolam,
                ];
                $isUpdate = $NvModal->update($nvArr);
                if ($isUpdate) {
                    $_SESSION['success'] = "Sửa thành công";
                    header("Location: index.php?controller=nhanvien&action=admin");
                }
                else {
                    $_SESSION['error'] = "Sửa thất bại";
                    header("Location: index.php?controller=nhanvien&action=error");
                }
                exit();
            }
        }
        require_once 'views/Nhanvien/edit.php';
    }
    function delete(){
        $id = $_GET['manv'];
        if (!is_numeric($id)) {
            header("Location: index.php?controller=nhanvien&action=index");
            exit();
        }
        $NvModal = new NhanvienModal();
        $isDelete = $NvModal->delete($id);
        if ($isDelete) {
            $_SESSION['success'] = "Xóa thành công";
        }
        else {
            $_SESSION['error'] = "Xóa thất bại";
            header("Location: index.php?controller=nhanvien&action=error");
        }
        header("Location: index.php?controller=nhanvien&action=admin");
        exit();
    }
    function error(){
        if(isset($_SESSION['error'])){
            require_once 'views/Nhanvien/error.php';
        }else{
            header("Location: index.php?controller=nhanvien&action=index");
        }
    }
}


?>
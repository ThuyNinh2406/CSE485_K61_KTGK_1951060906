<?php
require 'views/template/header.php'
?>
<head>
    <title>Sửa nhân viên</title>
</head>
<main>
    <div class="container">
        <div class="row">
            <a href="index.php?controller=nhanvien&action=admin" class="text-decoration-none"><i class="bi bi-arrow-left"></i>  Quay Lại</a>
            <div style="color: red">
                <?php echo $error; ?>
            </div>
            <div class="col-md-8 ms-auto me-auto">
                <h4>Sửa thông tin nhân viên</h4>
                <form class="row g-3 needs-validation" method="post" action="" novalidate>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Mã nhân viên cần sửa</label>
                        <input type="text" class="form-control" name="maNV" readonly id="validationCustom01" value="<?php echo isset($_GET['manv']) ? $_GET['manv'] : $nv['maNV']?>" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="hovaten" id="validationCustom01" value="<?php echo isset($_POST['hovaten']) ? $_POST['hovaten'] : $nv['hovaten']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Chức vụ</label>
                        <input type="text" class="form-control" name="chucvu" id="validationCustom02" value="<?php echo isset($_POST['chucvu']) ? $_POST['chucvu'] : $nv['chucvu']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Phòng ban</label>
                        <input type="text" class="form-control" name="phongban" id="validationCustom02" value="<?php echo isset($_POST['phongban']) ? $_POST['phongban'] : $nv['phongban']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Lương</label>
                        <input type="text" class="form-control" name="luong" id="validationCustom02" value="<?php echo isset($_POST['luong']) ? $_POST['luong'] : $nv['luong']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Ngày vào làm</label>
                        <input type="date" class="form-control" name="ngayvaolam" id="validationCustom02" value="<?php echo isset($_POST['ngayvaolam']) ? $_POST['ngayvaolam'] : $nv['ngayvaolam']?>" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" name="submit" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
require 'views/template/footer.php';
//file hiển thị thông báo lỗi
?>
<?php
require 'views/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <a href="index.php?controller=nhanvien&action=index" class="text-decoration-none"><i class="bi bi-arrow-left"></i>  Quay Lại</a>
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>Danh Sách Chi Tiết Nhân Viên</h3>
            </div>
            <?php
                require_once 'views/commons/message.php';
            ?>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=nhanvien&action=add"><button class="btn btn-primary">Thêm nhân viên</button></a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã nhân viên</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Phòng ban</th>
                            <th scope="col">Lương</th>
                            <th scope="col">Ngày vào làm</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($nv as $nva) {
                            $urlEdit =
                            "index.php?controller=nhanvien&action=edit&manv=" . $nva['maNV'];
                            $urlDelete =
                            "index.php?controller=nhanvien&action=delete&manv=" . $nva['maNV'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $nva['maNV'] ?></th>
                                <td><?php echo $nva['hovaten'] ?></td>
                                <td><?php echo $nva['chucvu'] ?></td>
                                <td><?php echo $nva['phongban'] ?></td>
                                <td><?php echo $nva['luong'] ?></td>
                                <td><?php echo $nva['ngayvaolam'] ?></td>
                                <td><a href="<?php echo $urlEdit ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="<?php echo $urlDelete ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
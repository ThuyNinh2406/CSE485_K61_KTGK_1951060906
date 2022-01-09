<?php
require 'views/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>Danh Sách Nhân Viên</h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=nhanvien&action=admin"><button class="btn btn-primary">Xem chi tiết</button></a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã nhân viên</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Phòng ban</th>
                            <th scope="col">Luong</th>
                            <th scope="col">Ngày vào làm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($nv as $nva) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $nva['maNV'] ?></th>
                                <td><?php echo $nva['hovaten'] ?></td>
                                <td><?php echo $nva['chucvu'] ?></td>
                                <td><?php echo $nva['phongban'] ?></td>
                                <td><?php echo $nva['luong'] ?></td>
                                <td><?php echo $nva['ngayvaolam'] ?></td>
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
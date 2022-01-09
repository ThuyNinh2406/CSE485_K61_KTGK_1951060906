<?php
require_once 'configs/database.php';
class NhanvienModal{
    private $manv;
    private $hovaten;
    private $chucvu;
    private $phongban;
    private $luong;
    private $ngayvaolam;

    public function getAllBD(){
        $conn = $this->connectDb();
        $sql = "SELECT * FROM nhanvien";
        $result = mysqli_query($conn, $sql);
        $arr_nv = [];
        if(mysqli_num_rows($result)>0){
            $arr_nv = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $arr_nv;
    }
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    public function insert($param = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO nhanvien (hovaten, chucvu, phongban, luong, ngayvaolam)
        VALUES ('{$param['hovaten']}', '{$param['chucvu']}', '{$param['phongban']}', '{$param['luong']}', '{$param['ngayvaolam']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }
    public function getBDById($maNV = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM nhanvien WHERE maNV={$maNV}";
        $results = mysqli_query($connection, $querySelect);
        $nvArr = [];
        if (mysqli_num_rows($results) > 0) {
            $bds = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $nvArr = $bds[0];
        }
        $this->closeDb($connection);

        return $nvArr;
    }
    public function update($bd = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE nhanvien 
        SET hovaten = '{$bd['hovaten']}', chucvu = '{$bd['chucvu']}', phongban = '{$bd['phongban']}', luong = '{$bd['luong']}', ngayvaolam = '{$bd['ngayvaolam']}'  WHERE maNV = {$bd['maNV']}";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }
    public function delete($manv = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM nhanvien WHERE maNV = {$manv}";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
}
?>
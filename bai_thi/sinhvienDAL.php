<?php 
require_once "DB.php";

class sinhvienDAL extends DB {
    function getList(){

        // lấy ra danh sách các bản ghi
        $sql = "SELECT *, sinhvien.id as sinhvien_id , sinhvien.name as sinhvien_name,  class.name as class_name
         FROM sinhvien INNER JOIN class ON class.id = sinhvien.class_id ";
        $result = mysqli_query($this->connect,$sql);
        return $result;
    }
    function getOne($id){
        $sql = "SELECT * FROM sinhvien WHERE id=$id";
        $result = mysqli_query($this->connect, $sql);
        return mysqli_fetch_assoc($result);
    }

    function add($name,$birthday,$image,$gender,$classId){
        $sql = "INSERT INTO `sinhvien`(`name`, `avata`, `birthday`, `gender`, `class_id`) VALUES ('$name', '$image', '$birthday' ,$gender,$classId)";
        mysqli_query($this->connect,$sql);
    }

    function edit($id,$name,$image,$birthday,$gender,$classId){
        $sql = "UPDATE `sinhvien` SET `name`='$name',`avata`='$image',`birthday`='$birthday',`gender`='$gender',`class_id`='$classId' WHERE id=$id";
        mysqli_query($this->connect,$sql);
    }

    function delete($id){
        $sql = "DELETE FROM sinhvien WHERE id =$id";
        mysqli_query($this->connect,$sql);
    }
}

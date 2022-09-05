<?php 
require_once 'DB.php';

class classDAL extends DB{
    function getList(){
        $sql = "SELECT * FROM class";
        $result = mysqli_query($this->connect, $sql);
        return  $result;
    }
}

?>
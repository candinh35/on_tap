<?php 
require_once 'sinhvienDAL.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $deleteImg = new sinhvienDAL();
    $row= $deleteImg->getOne($id); 
    $image = __DIR__.'/'. $row['avata'];
   $checked = unlink($image);
    $productDAL = new sinhvienDAL();
    $productDAL->delete($id);
    header('location:list_sinhvien.php');
}
?>
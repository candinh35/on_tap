<?php
require_once './dals/studentsDAL.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $studentsDAL = new studentsDAL();
    $tmp = new studentsDAL();
    $row = $tmp->getOne($id);
    $result = $studentsDAL->delete($id);
    $checked = __DIR__ . '/' . $row['avata'];
    echo $checked;
    unlink($checked);
    // header('location: list_students.php');
}

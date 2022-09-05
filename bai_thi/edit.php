<?php
require_once 'sinhvienDAL.php';
require_once 'classDAL.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sinhvienDAL = new sinhvienDAL();
    $row = $sinhvienDAL->getOne($id);
    // lấy lại tên lớp 
    $result = new classDAL();
    $row1 = $result->getList();
    $addSinhvien = new sinhvienDAL();


    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $classId = $_POST['class'];

        // đảo ngược lại định dạng ngày tháng

        $dao_nguoc = "$birthday";
        $birthday = date("m/d/Y" , strtotime($dao_nguoc));
        if (isset($_POST['gender']) && $_POST['gender'] == 'one') {
            $gender = 1;
        } else {
            $gender = 0;
        }
        if (isset($_FILES['image']) && $_FILES['image'] != null) {
            $dir = 'uploads/' . date('m') . '-' . date('y');
            if (!file_exists($dir) && !is_file($dir)) {
                mkdir($dir);
            }
            $nameImage = $_FILES['image']['name'];
            $nameTMP = $_FILES['image']['tmp_name'];
            $image = $dir . '/' . time() . $nameImage;
            $success = move_uploaded_file($nameTMP, $image);
            if ($success) {
                $deleteImg = __DIR__ . '/' . $row['avata'];
                unlink($deleteImg);
            }
        }
        echo $name;
        $addSinhvien->edit($id, $name, $birthday, $image, $gender, $classId);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form enctype="multipart/form-data" method="post">
        <div>
            <label for="">ho va ten</label>
            <input type="text" name="name" value="<?php echo $row['name'] ?>">
        </div>
        <div>
            <label for="">avatar</label>
            <input type="file" name="image" value="<?php echo $row['avata'] ?>">
        </div>
        <div>
            <label for="">ngay sinh</label>
            <input type="date" name="birthday" value="<?php 
            $dinhdang = $row['birthday'];
            $dao_nguoc = "$dinhdang";
            $dinhdang = date("Y/m/d" , strtotime($dao_nguoc));
            echo $dinhdang;
            ?>">
        </div>
        <div>
            <label for="">nam</label>
            <input type="radio" name="gender" value="one">
            <label for="">nu</label>
            <input type="radio" name="gender" value="two">
        </div>
        <div>

            <select name="class" id="">
                <?php foreach ($row1 as $item) : ?>
                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button>add</button>
    </form>
</body>

</html>
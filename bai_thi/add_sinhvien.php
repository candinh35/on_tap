<?php
require_once 'sinhvienDAL.php';
$sinhvienDAL = new sinhvienDAL();

require_once 'classDAL.php';
$classDAL = new classDAL();
$row = $classDAL->getList();
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];

    // đổi lại định dang của ngày tháng năm
    $dinh_dang_cu = "$birthday";  
		$birthday = date("m-d-Y", strtotime($dinh_dang_cu));  
    if (isset($_POST['gender']) && $_POST['gender'] == 'one') {
        $gender = 1;
    } else {
        $gender = 0;
    }
    $classId = $_POST['class'];
    if (isset($_FILES['image']) && $_FILES['image']['name'] != null) {
        $dir = 'uploads/' . date('m') . '-' . date('y');
        if (!file_exists($dir) && !is_file($dir)) {
            mkdir($dir);
        }
        $imgName = $_FILES['image']['name'];
        $image = $dir . '/' . time() . $imgName;
        $imageTMP = $_FILES['image']['tmp_name'];
        move_uploaded_file($imageTMP, $image);
    }
    $sinhvienDAL->add($name,$birthday,$image,$gender,$classId);

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
            <input type="text" name="name">
        </div>
        <div>
            <label for="">avatar</label>
            <input type="file" name="image" id="">
        </div>
        <div>
            <label for="">ngay sinh</label>
            <input type="date" name="birthday" id="">
        </div>
        <div>
            <label for="">nam</label>
            <input type="radio" name="gender" value="one">
            <label for="">nu</label>
            <input type="radio" name="gender" value="two">
        </div>
        <div>

            <select name="class" id="">
                <?php foreach ($row as $item) : ?>
                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button>add</button>
    </form>
</body>

</html>
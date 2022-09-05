<?php
require_once './dals/studentsDAL.php';
require_once './dals/classDAL.php';
$classDAl = new classDAL();
$row = $classDAl->getList();
$studentDAL = new studentsDAL();
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];

    // đổi lại định dang của ngày tháng năm
    $dinh_dang_cu = "$birthday";  
		$birthday = date("d-m-Y", strtotime($dinh_dang_cu));  
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
    $studentDAL->add($name,$birthday,$image,$gender,$classId);
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
    <style>
        .container {
            display: flex;
            gap: 50px;
            width: 1200px;
            margin: 0 auto;
        }

        .container>div:first-child {
            background-color: rebeccapurple;
            color: white;
            padding: 0 20px 0 20px;
        }

        .container>div:first-child div:hover {
            border-bottom: 2px solid;
        }

        .container>div:first-child div {
            margin-top: 10px;
        }

        .container>div:first-child a {
            text-decoration: none;
            color: white;
        }

        .container>div:last-child {
            background-color: #337;
            color: white;
            padding: 30px;
        }

        .flex {
            display: flex;
            gap: 20px;
        }

        .add {
            width: 120px;
            height: 30px;
            background-color: springgreen;
            border-radius: 2px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .add>a {
            color: #333;
            text-decoration: none;
        }

        .add:hover {
            opacity: 0.7;
            cursor: pointer;
        }

        .edit:hover {
            opacity: 0.7;
            cursor: pointer;
        }

        .edit {
            width: 120px;
            height: 30px;
            background-color: orange;
            border-radius: 2px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .edit>a {
            color: #333;
            text-decoration: none;
        }
        form>div{
            margin-bottom: 20px;
        }
    </style>
    <div class="container">
        <div>
            <a href="list.php">
                <h3>Trang chu</h3>
            </a>
            <div><a href="list_students.php">danh muc</a></div>
            <div><a href="add.php">them sinh vien</a></div>
        </div>
        <div>
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

        </div>
    </div>

</body>

</html>
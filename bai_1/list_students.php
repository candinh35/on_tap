<?php
require_once './dals/studentsDAL.php';
require_once 'config.php';
$studentDAL = new studentsDAL();
$row = $studentDAL->getList();

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
            gap: 20px
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
    </style>
    <div class="container">
        <div>
            <a href="list.php"><h3>Trang chu</h3></a>
            <div><a href="list_students.php">danh muc</a></div>
            <div><a href="add.php">them sinh vien</a></div>
        </div>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>avatar</th>
                        <th>name</th>
                        <th>ngay sinh</th>
                        <th>lop</th>
                        <th>lua chon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $item) : ?>
                        <tr>
                            <td><?php echo $item['sinhvien_id'] ?></td>
                            <td> <img width="100" height="100" src="<?php echo BASE_URL . $item['avata'] ?>"> </td>
                            <td><?php echo $item['sinhvien_name'] ?></td>
                            <td><?php echo $item['birthday'] ?></td>
                            <td><?php echo $item['class_name'] ?></td>
                            <td>
                                <a href="delete.php?id=<?php echo $item['sinhvien_id'] ?>">xoa</a>
                                <a href="edit.php?id=<?php echo $item['sinhvien_id'] ?>">sua</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><a href="add.php">them</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>
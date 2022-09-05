<?php
require_once "sinhvienDAL.php";
require_once 'config.php';
$sinhvienDAL = new sinhvienDAL();
$row = $sinhvienDAL->getList();

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
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>id</th>
                <th>avatar</th>
                <th>ho va ten</th>
                <th>ngay sinh</th>
                <th>gioi tinh</th>
                <th>lop</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($row as $item) : ?>
                <tr>
                    <td><?php echo $item['sinhvien_id'] ?></td>
                    <td><img width="100" height="100" src="<?php echo BASE_URL . $item['avata'] ?>" alt=""></td>
                    <td><?php echo $item['sinhvien_name'] ?></td>
                    <td><?php echo $item['birthday'] ?></td>
                    <td><?php if ($item['id'] == 1) {
                            echo "nam";
                        } else {
                            echo "nu";
                        }; ?></td>

                    <td><?php echo $item['class_name'] ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $item['sinhvien_id']?>">xoa</a>
                        <a href="edit.php?id=<?php echo $item['sinhvien_id']?>">sua</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>
                    <a href="add_sinhvien.php">them</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
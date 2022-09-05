<?php 
require_once 'classDAL.php';
$classDAL = new classDAL();
$row = $classDAL->getList();
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
                <th>lop</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($row as $item):?>
            <tr>
                <td><?php echo $item['id']?></td>
                <td><?php echo $item['name']?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>
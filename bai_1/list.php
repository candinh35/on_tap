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
        .flex{
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
        .add > a{
            color: #333;
            text-decoration: none;
        }
        .add:hover{
            opacity: 0.7;
            cursor: pointer;
        }
        
        .edit:hover{
            opacity: 0.7;
            cursor:pointer;
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
        .edit > a{
            color: #333;
            text-decoration: none;
        }
    </style>
    <div class="container">
        <div>
            <h3>Trang chu</h3>
            <div><a href="list_students.php">danh muc</a></div>
            <div><a href="add.php">them sinh vien</a></div>
        </div>
        <div>
            <h1>He thong dao tao bach khoa aptech</h1>
            <h3>trung tam day nghe </h3>
            <p>so 238 hoang quoc viet mai dich cau giay ha noi</p>
            <div class="flex">
                <div class="add"><a href="add.php">them sinh vien</a></div>
                <div class="edit"><a href="edit.php">sua sinh vien</a></div>
            </div>
        </div>
    </div>
</body>

</html>
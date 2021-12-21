<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    
    <title>Document</title>

</head>

<body>
<header>
        <div class="navig">
            <h1 class="head-text">Student Files</h1>
        </div>
    </header>
    <hr>
<?php 
include 'db.php';
$post_id = $_GET['post_id'];
$sql = "SELECT user.id_user, user.login, files.file_id, files.file_name, files.file_url,files.description FROM user
INNER JOIN files ON user.id_user = files.id_user WHERE files.file_id = ". $post_id;
$result = $GLOBALS['conn']->query($sql);
$row = $result->fetch();
?>
<div class="detail">
    <div class="detail_card">
        <p class="detail_p"><?php  echo $row["file_name"]?></a>
        <p class="detail_p" style="font-size: 18px;"><?php  echo $row["description"]?></a>
        <p class="detail_p" ><?php  echo "Выложил ". $row["login"]?></a>
        <a class = "detail_button" href="<?php  echo $row["file_url"] ?>" download="">Скачать</a>
    </div>
    <img src = "img/file.ico"class="detail_img">
</div>
</img>
<footer>


        <div class="icons">
            <a href="https://vk.com/niki_dn" target="_blank"><img src="img/vk.png" alt="" class="icon"></a>
            <a href="https://t.me/Nikita_U_L" target="_blank"><img src="img/tg.png" alt="" class="icon"></a>
        </div>
        <p class="mail">it.speed0120@gmail.com</p>

    </footer>
<body>
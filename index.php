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
<?php
include "db.php";
$count = 6;
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else { 
    $p = 1;
}
$offset = ($p-1) * $count;
try {
$conn = new PDO('mysql:host=localhost;dbname=file_hosting', $user, $pass);
$sql = "SELECT * FROM files ";
$result = $conn->query($sql);
$get_count = $result->rowCount();
$sql = "SELECT user.id_user, user.login, files.file_id, files.file_name, files.file_url,files.description FROM user
INNER JOIN files ON user.id_user = files.id_user  LIMIT $offset, $count";
$result = $conn->query($sql);

}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
$len = floor($get_count/$count);
?>
    <header>
        <div class="navig">
            <h1 class="head-text">Student Files</h1>
            <a class="entry" onclick="showEnter()">Вход</a>
        </div>
    </header>
    <hr>
    <?php
    ?>
    <div class="container">
    <?php  while($row = $result->fetch()){
        ?>
        <div class="card">
            <a href="/detail.php?post_id=<?=$row["file_id"]?>" class="def">
            <?php $arr_index[] = $row["id_user"]; echo $row["login"] . " поделился "?></a>
            <p class="def"><?php echo $row['file_name']?></p>
            <a><img src="img/file.ico" class="file_img" alt=""></a>
            <a href="/detail.php?post_id=<?=$row["file_id"]?>" target="_blank" class = "link"><?php echo " подробнее" ?></a>
        </div>
        <?php
    } 
    
    ?>
 
         
    </div>
    <div class="form" id="form1">
        <h1>Вход</h1>
        <a class="close" id="exit"></a>
        <div class="input-form">
            <input type="text" placeholder="Логин">
        </div>
        <div class="input-form">
            <input type="password" placeholder="Пароль">
        </div>
        <div class="input-form" id="enter">
            <input type="submit" value="Войти" class='validateBtn'>
        </div>

        <a href="#" class="forget" onclick="showRegistr()">Регистрация</a>
    </div>
    <form class="form" id="form2" action="register.php" method="post">
        <h1>Регистрация</h1>
        <a class="close" id="exit_reg"></a>
        <div class="input-form">
            <input type="text" class="test" placeholder="Имя" name="Name" id="name-input">
        </div>
        <div class="input-form">
            <input type="email" class="test" data-validate-field="email" placeholder="Email" name="Email" id="email-input">
        </div>
        <div class="input-form">
            <input type="tel" class="test" placeholder="Телефон" name="Tel" id="tel-input">
        </div>
        <div class="input-form">
            <input type="password" class="test" placeholder="Пароль" name="Password" id="pw1">
        </div>
        <div class="input-form">
            <input type="password" class="test" placeholder="Повторите пароль" name="PasswordSecond" id="pw2">
        </div>
        <div class="check-box">
            <button class="checkbox-button" id="checkBtn">
                <i class='check' id = "Icheck"></i>
            </button>
            <p class="checkbox-text">Я согласен на обработку персональных данных</p>
        </div>
        <div class="input-form" id="reg">
            <input type="submit" value="Зарегистрироваться">
        </div>

</form>

  <ul class="pagination">
      <? for($i=0;$i<=$len;$i++) {?>
    <a href="?p=<?= $i+1 ?>" class="pag"><?=$i+1 ?></a>
    <? } ?>
  </ul>

    <hr> 
    <footer>


        <div class="icons">
            <a href="https://vk.com/niki_dn" target="_blank"><img src="img/vk.png" alt="" class="icon"></a>
            <a href="https://t.me/Nikita_U_L" target="_blank"><img src="img/tg.png" alt="" class="icon"></a>
        </div>
        <p class="mail">it.speed0120@gmail.com</p>

    </footer>
</body>
<script src="inputmask.min.js"></script>
<script src="script.js"></script>

</html>
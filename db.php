<?php

$user = 'root';
$pass = '';
global $user, $pass;
$conn = new PDO('mysql:host=localhost;dbname=file_hosting', $user, $pass);
global $conn;

?>
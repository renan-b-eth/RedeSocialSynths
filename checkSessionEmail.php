<?php
// esse código faz com que o usuario não digita só a senha ou vai para outra parte do login
if (!session_id())
    session_start();

if (!isset($_SESSION['user'])) {
    header("Location:index.php");
}
?>

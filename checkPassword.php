<?php

session_start();
include_once ('./connectionBD.php');
require_once ('./user.php');

$user = new User(); /* Preciso usar o mesmo objeto da outra classe não criar outro */
$senhaDes = $_POST['password'];
$user->setPassword(sha1($_POST['password']));
$conn = openConnection();


if ($_SESSION['user'] != null && $user->getPassword() != null) {
    $emailMyi = mysqli_real_escape_string($conn, implode("", $_SESSION['user']));
    $passwordMyi = mysqli_real_escape_string($conn, $user->getPassword());
    $sql = ("select emailUser, passwordUser from tbUser where emailUser = '$emailMyi' and passwordUser = '$passwordMyi'");
    $sql2 = ("select idUser from tbUser where emailUser = '$emailMyi' and passwordUser = '$passwordMyi'");
    $result = mysqli_query($conn, $sql); // executa 
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_fetch_assoc($result); // ele pega a linha certa dos dados
    $result4 = mysqli_fetch_assoc($result2);

    if (empty($result3)) { // se tiver nada volta
        header("Location:index_1Error.php");
    } else if (!empty($result3)) { // se tiver executa isso
        $_SESSION['password'] = $result3; // salva a senha na session
        $_SESSION['id'] = $result4['idUser']; // salva o id do cara na session
        $_SESSION['passwordDes'] = $senhaDes;
        header("Location:pageMain.php");
    }
    closeConnection($conn);
}
?>

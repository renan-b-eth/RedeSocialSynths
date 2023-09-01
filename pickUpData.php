<?php

// tudo isso aqui é para pegar o nome e sobrenome para substituir na postagem

include_once './connectionBD.php';
$conn = openConnection();
session_start();

$idUser = $_SESSION['id'];
$sql = ("select nameUser, lastNameUser, nicknameUser, photoUser from tbUser where idUser = '$idUser'");
$result = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_assoc($result);
$nameUser = $result2['nameUser'];
$lastNameUser = $result2['lastNameUser'];
$nicknameUser = $result2['nicknameUser'];
$photoUser = $result2['photoUser']; // aqui ele pega o endereco da imagem do banco
$sql = ("SELECT tbConversa.idConversa from tbConversa inner join tbmsg on tbconversa.idConversa = tbmsg.idConversa  where idUser2='$idUser' or idUser1='$idUser' ORDER BY idMsg DESC LIMIT 1");
$result = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_assoc($result);
$_SESSION['idConversa']=$result2['idConversa'];

closeConnection($conn);
?>

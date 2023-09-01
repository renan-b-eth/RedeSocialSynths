<?php
session_start();
include_once ('./connectionBD.php');
include_once ('./pickUpData.php');
 $conn = openConnection();
 $aux=$_POST['aux'];
 $sql1 = ("select * from tbAmigos where (idUser='$idUser' or idAmigo='$idUser') and (idUser='$aux' or idAmigo='$aux') and status=3");  // faz o select das postagem da última para a primeira
$result1 = mysqli_query($conn, $sql1); // executa a query
$linha = mysqli_fetch_array($result1);
if( $linha['idUser'] != $idUser) {
$sql = ("DELETE from tbAmigos where  idUser='$aux' and idAmigo ='$idUser'");  // faz o SELECT das postagem da última para a primeira
        $result = mysqli_query($conn, $sql);
                } else {
$sql = ("DELETE from tbAmigos where  idUser='$idUser' and idAmigo ='$aux'");  // faz o SELECT das postagem da última para a primeira
        $result = mysqli_query($conn, $sql);                }


header("Location:myFriends.php");
closeConnection($conn);
?>
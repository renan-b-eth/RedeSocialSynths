<?php
session_start();
include_once ('./connectionBD.php');
include_once ('./pickUpData.php');
 $conn = openConnection();
 $aux=$_POST['aux'];
	if(isset($_POST['Accept'])) {
		$sql = ("UPDATE tbAmigos set status=3 where  idUser='$aux' and idAmigo ='$idUser'");  // faz o SELECT das postagem da última para a primeira
        $result = mysqli_query($conn, $sql);
	} else {
		$sql = ("DELETE from tbAmigos where  idUser='$aux' and idAmigo ='$idUser'");  // faz o SELECT das postagem da última para a primeira
        $result = mysqli_query($conn, $sql);
	}
header("Location:friendSolicitations.php");
closeConnection($conn);
?>
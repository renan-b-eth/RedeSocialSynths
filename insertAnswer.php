<?php
	session_start();
	include_once('./pickUpData.php');
	include_once ('./connectionBD.php');
	$conn = openConnection();
	$resp = $_POST['resposta'];
	$sql = ("update tbAmigos set status =2 where idAmigo='$idUser' and idUser=5"); //mudar valoooooooooooooooooooooooooor
	$result = mysqli_query($conn, $sql);	
	header("Location: pageMain.php");
	closeConnection($conn);
?>
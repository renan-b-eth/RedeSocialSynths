<?php
	include_once('./connectionBD.php');
	session_start();

	$conn = openConnection();
	$idUser = $_SESSION['id'];

	$sql = ("DELETE from tbUser where idUser = '$idUser'");
	$result = mysqli_query($conn,$sql);
	header("Location:index.php");

	closeConnection($conn);

?>
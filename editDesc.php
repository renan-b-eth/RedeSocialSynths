<?php
	include_once './connectionBD.php';
	session_start();
	$idUser = $_SESSION['id'];
	$desc = $_POST['desc'];
	$conn = openConnection();
	if(empty($desc)){
		$desc = "Fale um pouco sobre você ;D";
	}
	$sql = ("UPDATE tbUser SET aboutMeUser = '$desc' WHERE idUser = '$idUser'");
	$result = mysqli_query($conn, $sql);
	header("Location:myProfile.php");
	closeConnection($conn);
?>

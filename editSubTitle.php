<?php
	include_once './connectionBD.php';
	session_start();
	$idUser = $_SESSION['id'];
	$sub = $_POST['sub'];
	$conn = openConnection();
	if(empty($sub)){
		$sub = "Adicione um subtitulo ao seu perfil ;D";
	}
	$sql = ("UPDATE tbUser SET subTitleUser = '$sub' WHERE idUser = '$idUser'");
	$result = mysqli_query($conn, $sql);
	header("Location:myProfile.php");
	closeConnection($conn);
?>

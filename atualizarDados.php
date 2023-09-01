<?php

	include_once('./connectionBD.php');
	session_start();
	$conn = openConnection();
	$nome = $_POST['registeredName'];
	$sobreNome = $_POST['registeredLastName'];
	$senha = $_POST['registeredPassword'];
	$senha = sha1($senha);
	$senha2 = $_POST['registeredPassword2'];
	$senha2 = sha1($senha2);
	$_SESSION['password'] = $senha;
	$idUser = $_SESSION['id'];

	if($senha == "da39a3ee5e6b4b0d3255bfef95601890afd80709"){
		$sql = ("SELECT * from tbUser where idUser = '$idUser'");
		$result = mysqli_query($conn, $sql);
		$result2 = mysqli_fetch_assoc($result);
		$senha = $result2['passwordUser'];
	}

	if($senha == $senha2){
		$sql = ("UPDATE tbUser SET nameUser = '$nome', lastNameUser = '$sobreNome', passwordUser = '$senha' WHERE idUser = '$idUser'");
		$result = mysqli_query($conn, $sql);
		header("Location:pageMain.php");
	} else {
		echo("<script type='text/javascript'> alert('Senhas distintas, por favor preencha novamente.'); location.href='ajustes.php';</script>");
	}



	closeConnection($conn);

?>
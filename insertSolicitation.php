<?php
	session_start();
	include_once('./pickUpData.php');
	include_once ('./connectionBD.php');

	$conn = openConnection();
	$nickAmigo=$_POST['nick'];
	$idAmigo=$_POST['aux'];
	$fazer=$_POST['qndClicar'];

	//1 = pedido enviado
	//2 = pedido visualizado
	//3 = pedido aceito
	if($fazer == "adicionar") {
		$sql = ("insert into tbAmigos (status, idAmigo, idUser) values (1,'$idAmigo', '$idUser')");
		$result = mysqli_query($conn, $sql);
	} else if ($fazer=="excluir") {
		$sql = ("DELETE from tbAmigos where  (idUser='$idUser' and idAmigo ='$idAmigo') or (idUser='$idAmigo' and idAmigo ='$idUser')");
		$result = mysqli_query($conn, $sql);
	}
	closeConnection($conn);

	header("Location:profile.php?nicknameUser=".$nickAmigo);
?>
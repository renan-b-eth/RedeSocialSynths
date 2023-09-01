<?php
	include_once('./pickUpData.php');
	include_once ('./connectionBD.php');
	$conn = openConnection();
	$sql = ("select count(idAmigos) from tbAmigos where idAmigo = '$idUser' and status = 1"); //MUDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAR
	$result = mysqli_query($conn, $sql);	
	$result2 = mysqli_fetch_assoc($result);



	if($result2['count(idAmigos)']>0) {
		echo'<form name="aceitarAmigo" action="insertAnswer.php" method="post">
            <input type="submit" value="Aceitar" name="resposta">
        </form>';		
	}
	closeConnection($conn);
?>
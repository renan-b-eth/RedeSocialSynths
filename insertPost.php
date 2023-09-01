
<?php

include_once './connectionBD.php';
session_start();
$conn = openConnection();
$post = $_POST['post'];
if(!empty($_FILES['image']['name'])) {
	$nome = $_FILES['image']['name'];
	$destino = "imagens/Publicacoes/".$nome;
	$origem = $_FILES["image"]["tmp_name"];
	move_uploaded_file($origem, $destino);
}

/*$date = getdate();
$day = date("d");
$month = date("m");
$year = date("Y");
$hour = date("H");
$minute = date("i");
$second = date("s");*/
$date = date("Y-m-d");
/*$date = $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':'.$second;*/
$idUser = $_SESSION['id']; // pega o id do cara
$_SESSION['data'] = $date; // guarda nessa session

if ($post == null && $destino==null) { // se for vázio faz isso aqui, mas não adianta de nada kkk
    echo '<script>alert("Essa mensagem não serve para nada kkkk");</script>';
} else if (!empty($_FILES['image']['name'])) {
    
    $sql = ("insert into tbPost(textPost, idUser, datePost, photoPost) values('$post', '$idUser', '$date', '$destino')"); // insere o post dele no banco
    $result = mysqli_query($conn, $sql); // executa 
} else {
	 $sql = ("insert into tbPost(textPost, idUser, datePost) values('$post', '$idUser', '$date')"); // insere o post dele no banco
    $result = mysqli_query($conn, $sql); // executa 
}
header("location:pageMain.php"); // volta para a página inicial
closeConnection($conn); // fecha

?>

<?php
include_once("./checkSession.php");
include_once("./connectionBD.php");
include_once("./pickUpData.php");
$conn = openConnection();
// se der o erro de diretorio não achado é por causa do tamanho da imagem que é > 2 megas 
if (isset($_FILES['image']['name'])) {
    $nome = $_FILES['image']['name'];
    $destino = "imagens/FotoPerfil/" . $nome;
    $origem = $_FILES['image']['tmp_name'];
    move_uploaded_file($origem, $destino);
    $tipo = $_FILES['image']['type']; // recebe o nome completo oi.png
    $tipo = explode("/", $tipo); // tira o nome e deixa só a extensão png
    $tipo2 = end($tipo);
    
    if ($tipo2 == "png") {
        $imagem = imagecreatefrompng($destino);
    } else if ($tipo2 == "jpeg") {
        $imagem = imagecreatefromjpeg($destino);
    }
    list($largura, $altura) = getimagesize($destino);

     if ($altura > $largura && $altura > 200) {
        //altura tem que ser 500
        $novaAltura = 200;
        $novaLargura = $largura * $novaAltura / $altura;
        $newImage = imagecreatetruecolor($novaLargura, $novaAltura);
        imagecopyresampled($newImage ,$imagem , 0, 0, 0, 0, $novaLargura, $novaAltura, $largura, $altura);
        if ($tipo2 == "png") {
            imagepng($newImage, 'imagens/FotoPerfil/' . $nome . '', 1);
        } else if ($tipo2 == "jpeg") {
            imagejpeg($newImage, 'imagens/FotoPerfil/' . $nome . '', 85);
        }
    } else if ($largura > $altura && $largura > 200){
        // largura tem que ser 500
        $novaLargura = 200;
        $novaAltura = $altura * $novaLargura / $largura;
        $newImage = imagecreatetruecolor($novaLargura, $novaAltura);
        imagecopyresampled($newImage, $imagem, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura, $altura);
        if ($tipo2 == "png") {
            imagepng($newImage, 'imagens/FotoPerfil/' . $nome . '', 1); // aqui ele salva a imagem por cima, se quiser a imagem original só por em outra pasta
        } else if ($tipo2 == "jpeg") {
            imagejpeg($newImage, 'imagens/FotoPerfil/' . $nome . '', 85);
        }
    } else {
		if($lagura > $altura){
			$novaLargura = 200;
			$novaAltura = $altura * $novaLargura / $largura;
		} else if($lagura < $altura){
            $novaAltura = 200;
            $novaLargura = $largura * $novaAltura / $altura;
		} else {
			$novaLargura = 200;
			$novaAltura = 200;
		}
    	$newImage = imagecreatetruecolor($novaLargura, $novaAltura);
        imagecopyresampled($newImage, $imagem, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura, $altura);
        if ($tipo2 == "png") {
            imagepng($newImage, 'imagens/FotoPerfil/' . $nome . '', 1); // aqui ele salva a imagem por cima, se quiser a imagem original só por em outra pasta
        } else if ($tipo2 == "jpeg") {
            imagejpeg($newImage, 'imagens/FotoPerfil/' . $nome . '', 85);
        }
    }
    $sql = ("INSERT INTO tbUser(photoUser, idUser) VALUES('$destino','$idUser')");
    $sql2 = ("UPDATE tbUser SET photoUser = '$destino' where idUser = '$idUser'");

    echo $sql2;
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    //Header("Location:myProfile.php");
}

closeConnection($conn);
?>

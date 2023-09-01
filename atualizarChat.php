<?php

    include_once ('./connectionBD.php');


class Messagem{
    public $texto;
    public $autor;
    public $idAutor;
}
    $conn = openConnection();
    session_start();
    $quemEuSou = $_SESSION['idUser'];
    $comQuemEstouFalando = $_SESSION['idPar'];

    $sql1 = "SELECT * FROM tbConversa where (idUser1='$quemEuSou' and idUser2='$comQuemEstouFalando') or (idUser2='$quemEuSou' and idUser1='$comQuemEstouFalando')";
    $resultado1 = mysqli_query($conn, $sql1);
    $idConversa = mysqli_fetch_array($resultado1)['idConversa'];

    $sql = "SELECT * FROM tbConversa inner join tbMsg on tbConversa.idConversa = tbMsg.idConversa where tbMsg.idConversa = '$quemEuSou' and tbMsg.textoMsg not like 'co4de1c8h3a5tdeamigonovo542$39'";
        $resultado = mysqli_query($conn, $sql);

    $posts = [];
    $contador = 0;
    while($linha = mysqli_fetch_array($resultado)){//similar ao for each
        $idA=$linha['idUser'];
        $sql3 = "SELECT * FROM tbUser where idUser= '$idA'";
        $resultado3 = mysqli_query($conn, $sql3);
        $array3 =  mysqli_fetch_array($resultado3);
        $nome = $array3['nameUser'].' '.$array3['lastNameUser'];
        $msg = new Messagem();
        $msg->texto = $linha["textoMsg"];
        $msg->idAutor = $linha["idUser"];  
        $msg->autor = $nome;        
        $posts[$contador] = $msg;
        $contador++;
    }
    //   co4de1c8h3a5tdeamigonovo542$39
    closeConnection($conn);
    echo (json_encode($posts));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
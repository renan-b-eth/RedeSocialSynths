<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>my Profile</title>
    <link href="css/style/stylePattern.css" rel="stylesheet" type="text/css"/>
    <link href="css/style/styleMyProfile.css" rel="stylesheet" type="text/css"/>
    <link href="css/style/stylePageMain.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/lightview/lightview.css" />
      <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.Jcrop.js"></script>
    <meta name="description" content="Rede Social com o objetivo de ajuntar as idéias">
    <meta name="keywords" content="">
</head>
<body style="background: #f1f1f1;">
        <?php

            include_once './connectionBD.php';
            include_once ('./checkSession.php');
            include_once ('./pickUpData.php'); // pega todos os dados
        ?>

        <script language="javascript">
            function editarDesc() {
                document.getElementById('formdesc').style.display="block";
                document.getElementById('descEscrita').style.display="none";
            }

             function cancelarDesc() {
                document.getElementById('formdesc').style.display="none";
                document.getElementById('descEscrita').style.display="block";
            }

             function editarSub() {
                document.getElementById('formSub').style.display="block";
                document.getElementById('subEscrita').style.display="none";
            }

             function cancelarSub() {
                document.getElementById('formSub').style.display="none";
                document.getElementById('subEscrita').style.display="block";
            }

            function autoResize() {
                objTextArea = document.getElementById('inputPostar');
                while (objTextArea.scrollHeight > objTextArea.offsetHeight)
                {
                    objTextArea.rows += 1;
                }
            }
            $(document).ready(function () {
                $('#insurerLeft').scrollToFixed({marginTop: 10, limit: $($('h2')[5]).offset().top});
            });
        </script>


        <div id="header">
            <div id="backHeader" ondragstart='return false'><div class="marquee"><img src="imagens/icones/IconesHeader/headerPrincipal.png"><img src="imagens/icones/IconesHeader/headerPrincipal2.png"></div></div>   
            <div id="centralizerHeader">
                <form name="search" action="search.php" method="post">
                    <input type="text" name="searcher" id="inputSearch" placeholder="Pesquisar"> 
                </form>
                <div id="linhazinha"></div>
                <div id="logo"></div>
                <a href="myProfile.php"><img src="<?php echo $photoUser ?>" height="100%" width="100%" id="fotoPerfilHeader"></a>
                <div id="nomeHeader"><?php echo $nameUser ?></div>
                  <div id = "menuzinhoHeader"><div id="optionSaida"><a href="ajustes.php"><div class="optionHeader" style="margin-top: 25px;">Ajustes</div></a><a href="destroySession.php"> <div class="optionHeader" style= "  border-top-style: solid;border-top-width: 1px; border-top-color: #ccc;">Sair</div></a></div></div>
            </div>
        </div>
        <div id="container" style="height: 500px;">
            <center><span style="color: dodgerblue; margin:auto; font-family: 'Corbel'; font-size: 25px;">Trocar foto de perfil</span><br><br>
                    <form name="form" method="post" action="trocarFoto2.php" enctype="multipart/form-data">
                        <input type="file" name="image" ><br><br>
                        <input type = "submit" name = "enviar" value="Enviar" class="enviar">
                    </form></center>
        </div>
    </div>
</div>

<div id="insurerBarOptions">
    <a href="pageMain.php"><img class="option" src="imagens/icones/IconesBarraEsquerda/iconFeedNoticias.png" width="100%" height="100%" title="Feed de Notícias"></a>
    <img class="option" src="imagens/icones/IconesBarraEsquerda/iconMensagens.png" width="100%" height="100%" title="Mensagens">
    <img class="option" src="imagens/icones/IconesBarraEsquerda/iconFotos.png" width="100%" height="100%" title="Fotos">
    <img class="option" src="imagens/icones/IconesBarraEsquerda/iconRoles.png" width="100%" height="100%" title="Rolês">
    <a href="friendSolicitations.php"><img class="option" src="imagens/icones/IconesBarraEsquerda/iconAmigos.png" width="100%" height="100%" title="Amigos"></a>
    <img class="option" src="imagens/icones/IconesBarraEsquerda/iconGames.png" width="100%" height="100%" title="Games">
</div>

        <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="js/swfobject.js"></script>
        <script type="text/javascript" src="js/spinners/spinners.min.js"></script>
        <script type="text/javascript" src="js/lightview/lightview.js"></script>

        <script src='js/jquery.marquee.js'></script>
        <script src="js/marquee.js"></script>
        <!--FIM SCRIPTS DO HEADER-->

        <script src='js/autosize.js'></script>
        <script>
        autosize(document.querySelectorAll('textarea'));
        </script>

</body>
</html>

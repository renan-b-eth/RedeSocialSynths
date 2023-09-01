<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajustes</title>

        <link href="css/style/stylePattern.css" rel="stylesheet" type="text/css"/>
        <link href="css/style/styleMyProfile.css" rel="stylesheet" type="text/css"/>
        <link href="css/style/styleAjustes.css" rel="stylesheet" type="text/css"/>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>
        <script src="https://raw.github.com/danpalmer/jquery.complexify.js/master/jquery.complexify.js"></script>
        <meta name="description" content="Rede Social com o objetivo de ajuntar as idéias">
        <meta name="keywords" content="">
    </head>
    <style type="text/css">
        input {
            background: none;
        }
    </style>
    <script type="text/javascript">
    function mudar(qual) {
        document.getElementById("add").style.backgroundImage = "url('imagens/icones/OutrosIcones/"+qual+".png')";
    }

    </script>
    <body style="background: #f1f1f1;">

        <?php

        include_once ('./checkSession.php');
        include_once ('./pickUpData.php'); // pega todos os dados
        include_once './connectionBD.php';
        $conn = openConnection();

        ?>
        <script language="javascript">
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
            function BoolDel(obj){
                if( confirm('Deseja mesmo excluir a conta?') )obj.submit();
                else 
            return false;
            }
        </script>

            <?php

                include_once './connectionBD.php';
                include_once ('./checkSession.php');
                include_once ('./pickUpData.php'); // pega todos os dados
                $conn = openConnection();
                $sql = ("select * from tbUser where idUser ='$idUser'");
                $result = mysqli_query($conn, $sql);
                $result2 = mysqli_fetch_assoc($result);
                $subtitle = $result2['subtitleUser'];
                $aboutMe = $result2['aboutMeUser'];
                $senhaAtual = $_SESSION['passwordDes'];


            ?>

        <div id="header">
            <div id="backHeader" ondragstart='return false'><div class="marquee"><img src="imagens/icones/IconesHeader/headerPrincipal.png"><img src="imagens/icones/IconesHeader/headerPrincipal2.png"></div></div>   
            <div id="centralizerHeader">
                <form name="search" action="search.php" method="post">
                    <input type="text" name="searcher" id="inputSearch" placeholder="Pesquisar"> 
                </form>
                <div id="linhazinha"></div>
                <a href="pageMain.php"><div id="logo"></div></a>
                <a href="myProfile.php"><img src="<?php echo $photoUser ?>" height="100%" width="100%" id="fotoPerfilHeader"></a>
                <div id="nomeHeader"><?php echo $nameUser ?></div>
                  <div id = "menuzinhoHeader"><div id="optionSaida"><a href="ajustes.php"><div class="optionHeader" style="margin-top: 25px;">Ajustes</div></a><a href="destroySession.php"> <div class="optionHeader" style= "  border-top-style: solid;border-top-width: 1px; border-top-color: #ccc;">Sair</div></a></div></div>
            </div>
        </div>
        <div id="container">
            <center><div id="titulo">Ajustes</div></center>
            <div id="insurerLeft">
                 <div id="borderPhotoProfile">
                        <center><img src="<?php echo $photoUser ?>" height="100%" width="100%" id="photoProfile"></center>
                </div>
                <form name="deletarConta" method="post" action="deletarConta.php">
                    <input type="button" name="Encerrar Conta" value="Encerrar conta" class="deletarConta" onclick="BoolDel(this.form);">
                </form>
            </div>

            <div id="insurerRight">
                <form name="atualizarDados" method="post" action="atualizarDados.php">
                    <span>Nome</span><br>
                   <input class="inputName" type="text" name="registeredName" value="<?php echo $nameUser;?>" placeholder="Novo nome" required>
                   <span style="position: relative; top: -33px;">Sobrenome</span><br>
                   <input class="inputLastName" type="text" name="registeredLastName" value="<?php echo $lastNameUser;?>" placeholder="Novo sobrenome" required>
                    <span style="position: relative; right: 160px;">Senha</span><br>
                <input  id="password" class="inputPassword" type="password" name="registeredPassword" value ="<?php echo $senhaAtual?>" placeholder="Nova senha" >
                 <input  class="inputPasswordAgain" type="password" name="registeredPassword2" value ="<?php echo $senhaAtual?>" placeholder="Sua senha novamente" ><br>
                 <input type="submit" name="Alterar" value="Alterar" class="alterar">
                </form>
            </div>
        </div>

        <div id="insurerBarOptions">
            <a href="pageMain.php"><img class="option" src="imagens/icones/IconesBarraEsquerda/iconFeedNoticias.png" width="100%" height="100%" title="Feed de Notícias"></a>
            <img class="option" src="imagens/icones/IconesBarraEsquerda/iconMensagens.png" width="100%" height="100%" title="Mensagens">
            <img class="option" src="imagens/icones/IconesBarraEsquerda/iconFotos.png" width="100%" height="100%" title="Fotos">
            <img class="option" src="imagens/icones/IconesBarraEsquerda/iconRoles.png" width="100%" height="100%" title="Rolês">
            <img class="option" src="imagens/icones/IconesBarraEsquerda/iconAmigos.png" width="100%" height="100%" title="Amigos">
            <img class="option" src="imagens/icones/IconesBarraEsquerda/iconGames.png" width="100%" height="100%" title="Games">
        </div>
        <?php
            closeConnection($conn);
        ?>

        <!--SCRIPTS DO HEADER-->
        <script src="js/validation2.js"></script>
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

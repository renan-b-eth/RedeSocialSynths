<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Synth's faça sua synth's conosco</title>
        <link href="css/style/stylePattern.css" rel="stylesheet" type="text/css"/>
        <link href="css/style/stylePageMain.css" rel="stylesheet" type="text/css"/>
        <meta name="description" content="Rede Social com o objetivo de juntar as ideias">
        <meta name="keywords" content="">

    </head>
    <?php
    /* session_start(); */
    include_once ('./checkSession.php');
    include_once ('./pickUpData.php');
    include_once ('./checkNotifications.php'); //ARRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRUMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAR
    ?>
    <script language="javascript">
        function autoResize()
        {
            objTextArea = document.getElementById('inputPostar');
            while (objTextArea.scrollHeight > objTextArea.offsetHeight)
            {
                objTextArea.rows += 1;
            }
        }
    </script>
    <style>
        .post {
            margin-top: 0px;
        }
        .caixaPost {
            min-height: 60px;
        }
        .barLeft {
            height: 88px;
        }
        .accept {
            width: 90px;
            height: 23px;
            line-height: 23px;
            background-color: #993ea8;
            position: absolute;
            right: 10px;
            font-size: 13px;
            text-align: center;
            color: white;
            cursor: pointer;
            font-family: 'Corbel';
            border-radius: 10px;
            bottom: 5px;
        }
        .accept:hover {
            background: #ae46bf;
        }
        .delete {
            width: 60px;
            font-size: 13px;
            height: 23px;
            line-height: 23px;
            background-color: none;
            border-color: #b2b2b2;
            border-style: solid;
            border-width: 1px;
            position: absolute;
            right: 5px;
            text-align: center;
            color: #b2b2b2;
            cursor: pointer;
            font-family: 'Corbel';
            border-radius: 10px;
            bottom: 5px;
            transition: 0.2s;
        }
        .delete:hover {
            background-color: #c81d1d;
            color: white;
            background-color: none;
            border-color: white;
            border-style: solid;
            border-width: 1px;
        }
        input {
            background: none;
        }
        #msg {
            text-align: center;
            font-size: 20px;
            margin-top: 220px;
            color: #aaa;
            font-family: 'Corbel';

        }
    </style>
    <body>
        <!--INICIO DO HEADER-->
        <div id="header">
            <div id="backHeader" ondragstart='return false'><div class="marquee"><img src="imagens/icones/IconesHeader/headerPrincipal.png"><img src="imagens/icones/IconesHeader/headerPrincipal2.png"></div></div>   
            <div id="centralizerHeader">
                <form name="search" method="post">
                    <input type="text" name="searcher" id="inputSearch" placeholder="Pesquisar"> 
                </form>
                <div id="linhazinha"></div>
                <div id="logo"></div>
                <a href="myProfile.php"><img src="<?php echo $photoUser ?>" height="100%" width="100%" id="fotoPerfilHeader"></a>
                <div id="nomeHeader"><?php echo $nameUser ?></div>
                <div id = "menuzinhoHeader"></div>
            </div>
        </div>
        <!--FIM DO HEADER, mas nao esqueca de colar os scripts dele lá em baixo!-->

        <div id = "insurerBarOptions">
            <a href="pageMain.php"><img class = "option" src = "imagens/icones/IconesBarraEsquerda/iconFeedNoticias.png" width = "100%" height = "100%" title = "Feed de Notícias"></a>
            <img class = "option" src = "imagens/icones/IconesBarraEsquerda/iconMensagens.png" width = "100%" height = "100%" title = "Mensagens">
            <img class = "option" src = "imagens/icones/IconesBarraEsquerda/iconFotos.png" width = "100%" height = "100%" title = "Fotos">
            <img class = "option" src = "imagens/icones/IconesBarraEsquerda/iconRoles.png" width = "100%" height = "100%" title = "Rolês">
            <a href="friendSolicitations.php"><img class = "option" src = "imagens/icones/IconesBarraEsquerda/iconAmigos.png" width = "100%" height = "100%" title = "Amigos"></a>
            <img class = "option" src = "imagens/icones/IconesBarraEsquerda/iconGames.png" width = "100%" height = "100%" title = "Games">
        </div>
        <div id = "centralizer">
             <?php
            include_once ('./checkSession.php');
            include_once ('./pickUpData.php'); // pega todos os dados
            include_once './connectionBD.php';
            $nomePesquisado = $_POST['searcher'];

            $conn = openConnection();
            $sql = ("SELECT * from tbUser where UPPER(nameUser) LIKE UPPER('$nomePesquisado%') ||  UPPER(lastNameUser) LIKE UPPER('$nomePesquisado%')");
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)==0) {
                echo'<div id="msg">Não há usuários com esse nome cadastrado ;-;</div>';
            }
            $eu=false;
            while ($linha = mysqli_fetch_array($result)) {
                if($linha['nicknameUser']!=$nicknameUser) {
                    echo '<div class="post">
                <div class="barLeft">
                    <a href="./profile.php?nicknameUser='.$linha['nicknameUser'].'"><div class="fotoPost" ><img src="'.$linha['photoUser'].'" class="normal"></div> </a>
                </div>
                <div class="caixaPost">
                    <div class="nomeUserPost"><b>' . $linha['nameUser']. ' ' . $linha['lastNameUser'].'</div>
                         <a href="./profile.php?nicknameUser='.$linha['nicknameUser'].'"><div class="accept">Visualizar Perfil</div></a>
                </div>
                </div>';
                $eu=true;
                } else if (mysqli_num_rows($result)==1) {
                    echo'<div id="msg">Não há usuários com esse nome cadastrado ;-;</div>';
                }
                
            }
            closeConnection($conn); // fecha a conexão
            ?>
        </div>
        <br>
        <br>
        <br>

         <!--SCRIPTS DO HEADER-->

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

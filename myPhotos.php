<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>My Friends</title>
     <link href="css/style/stylePattern.css" rel="stylesheet" type="text/css"/>
    <link href="css/style/styleMyProfile.css" rel="stylesheet" type="text/css"/>
    <link href="css/style/stylePageMain.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/lightview/lightview.css" />
    <link href="css/style/styleMyPhotosProfile.css" rel="stylesheet" type="text/css"/>
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
            <?php
            $conn = openConnection();
            $sql = ("select * from tbUser where idUser ='$idUser'");
            $result = mysqli_query($conn, $sql);
            $result2 = mysqli_fetch_assoc($result);
            $subtitle = $result2['subtitleUser'];
            $aboutMe = $result2['aboutMeUser'];

            ?>
        </div>
        <div id="container" style="width:1100px;">
            <div id="insurerLeft">
                <div id="insurerDados">
                    <div id="borderPhotoProfile">

                        <center><a href="<?php echo $photoUser ?>" class="lightview" data-lightview-group="<?php echo $photoUser ?>" data-lightview-title="" data-lightview-caption=""><img src="<?php echo $photoUser ?>" height="100%" width="100%" id="photoProfile"></a></center>
                    </div>
                    <div id="nameProfile"><center><?php if (strlen($nameUser) > 15 || strlen($lastNameUser) > 10 && strlen($nameUser) > 5) {
                        echo '<script>document.getElementById("nameProfile").style.fontSize = "15px";</script>';
                    }echo $nameUser . ' ' . $lastNameUser ?></center></div>
                    <div id="nicknameProfile"><center><span style="color: dodgerblue;">*</span> <?php echo $nicknameUser ?> <span style="color: dodgerblue;">*</span></center></div>
                    <div id="fraseProfile">
                        <center><?php echo $subtitle;?></center>
                    </div>
                </div>
                <div id="insurerAboutMe">
                    <div id="aboutMe">Sobre mim</div>
                    <hr class="separador">
                    <div id="textAboutMe"><?php echo $aboutMe;?></div>
                </div>
                <div id="insurerPhotosProfile">
                    <div id="titlePhotos">Fotos</div>
                    <hr class="separador">

                    <?php
                    $sql = ("select * from tbPost where idUser='$idUser' and photoPost is not null LIMIT 6");
                    $result = mysqli_query($conn, $sql);
                    $numPhotos = mysqli_num_rows($result);


                    echo '<div id="insurerPhotos">';
                     if($numPhotos == 0){
                        echo 'Você ainda não possui fotos.';
                    }
                    while($linha = mysqli_fetch_array($result)){
                        $TamanhoImagem = getimagesize($linha['photoPost']);
                        $wid=$TamanhoImagem[0];
                        $hei=$TamanhoImagem[1];
                        if($wid>$hei) {
                           echo '<div class="photosProfile">
                           <a href="'.$linha['photoPost'].'" class="lightview" data-lightview-group="'.$nicknameUser.'" data-lightview-title="'.$nameUser.' '.$lastNameUser.'" data-lightview-caption="'.$linha['textPost'].'">
                           <img src="'.$linha['photoPost'].'" height="100%" alt=""/></div></a>';
                       } else {
                           
                           echo '<div class="photosProfile">
                           <a href="'.$linha['photoPost'].'" class="lightview" data-lightview-group="'.$nicknameUser.'" data-lightview-title="'.$nameUser.' '.$lastNameUser.'" data-lightview-caption="'.$linha['textPost'].'">
                           <img src="'.$linha['photoPost'].'" width="100%" alt=""/></div></a>';
                       }

                   }
                   echo '</div>';
                   ?>

               </div>
           </div>

           <div id="insurerRight" style=" width: 700px;">
            
<?php

            // conversao das datas
            // aqui conecta no banco

            //arrumei aqui, pq nessa page tem q aparecer post de geral n so do user
            $sql = ("SELECT * from tbPost where idUser='$idUser' and photoPost is not null");  // faz o select das postagem da última para a primeira
            $result = mysqli_query($conn, $sql); // executa a query

            while ($linha = mysqli_fetch_array($result)) {  // pega todos os dados da tabela e coloca em um array    
                
                
               
                echo '<div class="image"><div class="imageIn">';
                    if($wid>$hei) {
                           echo '
                           <a href="'.$linha['photoPost'].'" class="lightview" data-lightview-group="'.$nicknameUser.'" data-lightview-title="'.$nameUser.' '.$lastNameUser.'" data-lightview-caption="'.$linha['textPost'].'">
                           <img src="'.$linha['photoPost'].'" height="120%" alt=""/></a>';
                       } else {
                           
                           echo '
                           <a href="'.$linha['photoPost'].'" class="lightview" data-lightview-group="'.$nicknameUser.'" data-lightview-title="'.$nameUser.' '.$lastNameUser.'" data-lightview-caption="'.$linha['textPost'].'">
                           <img src="'.$linha['photoPost'].'" width="120%" alt=""/></a>';
                       }
                echo '</div></div>';
              
            }
            
            ?>


        </div>
    </div>
</div>

 <div id = "insurerBarOptions">
            <a href="pageMain.php"><div class="option"><img src = "imagens/icones/IconesBarraEsquerda/iconFeedNoticias.png" width = "100%" height = "100%" title = "Feed de Notícias"></div></a>
            <a href="#"><div class="option"><img src = "imagens/icones/IconesBarraEsquerda/iconMensagens.png" width = "100%" height = "100%" title = "Mensagens"></div></a>
            <a href="#"><div class="option"><img src = "imagens/icones/IconesBarraEsquerda/iconFotos.png" width = "100%" height = "100%" title = "Fotos"></div></a>
            <a href="#"><div class="option"><img src = "imagens/icones/IconesBarraEsquerda/iconRoles.png" width = "100%" height = "100%" title = "Rolês"></div></a>
            <a href="friendSolicitations.php"><div class="option"><img src = "imagens/icones/IconesBarraEsquerda/iconAmigos.png" width = "100%" height = "100%" title = "Amigos">
            <?php

            $sql = ("SELECT count(idAmigo) from tbAmigos  where  status=1 and idAmigo ='$idUser'");  // faz o SELECT das postagem da última para a primeira
            $result = mysqli_query($conn, $sql);
            $linha = mysqli_fetch_array($result);
            $notificacaoAmigos=$linha['count(idAmigo)'];
            if( $notificacaoAmigos>0) {
                echo '<div class="bolinha">'. $notificacaoAmigos.'</div>';
            }
            closeConnection($conn); // fecha a conexão
            ?>
            </div></a>
            <a href="#"><div class="option"><img class = "option" src = "imagens/icones/IconesBarraEsquerda/iconGames.png" width = "100%" height = "100%" title = "Games"></div></a>
        </div>

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

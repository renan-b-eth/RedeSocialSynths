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
        $nick=$_GET['nicknameUser'];
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
        <div id="container">
            <div id="insurerLeft">
                <div id="insurerDados">
                    <div id="borderPhotoProfile">
                    <?php
                    $sql = ("select * from tbUser where nicknameUser = '$nick'");
                    $usuario = mysqli_query($conn, $sql);
                    $usuario2 = mysqli_fetch_assoc($usuario);
                    $idUser2=$usuario2['idUser'];
                    $nameUser2 = $usuario2['nameUser'];
                    $lastNameUser2 = $usuario2['lastNameUser'];
                    $nicknameUser2 = $usuario2['nicknameUser'];
                    $photoUser2 = $usuario2['photoUser'];
                    $subtitle = $usuario2['subtitleUser'];
                    $aboutMe = $usuario2['aboutMeUser'];
                
                    ?>
                        <center><img src="<?php echo $photoUser2 ?>" height="100%" width="100%" id="photoProfile"></center>

                        
                        <?php
                            $sqlb = ("select * from tbAmigos where ((idUser='$idUser' and idAmigo='$idUser2') or (idUser='$idUser2' and idAmigo='$idUser'))");
                            $usuariob = mysqli_query($conn, $sqlb);
                            $usuariobb = mysqli_fetch_assoc($usuariob);
                            $add="add";
                            $qndClicar="adicionar";
                            if ($usuariobb['status']==1){
                                $add="sent";
                                $qndClicar="excluir";//excluir solicitacao amizade
                                echo'
                                <style>
                                    #add:hover{
                                        background-image: url("imagens/icones/OutrosIcones/x.png");
                                    }
                                </style>
                                ';
                            } else if($usuariobb['status']==3) {
                                $add="accept";
                                $qndClicar="excluir";//excluir amigo
                                echo'
                                <style>
                                    #add:hover{
                                        background-image: url("imagens/icones/OutrosIcones/x.png");
                                    }
                                </style>
                                ';
                            }
                            
                        echo'
                            <form name="teste" method="post" action="insertSolicitation.php">
                                <input type="text" value="'.$idUser2.'" style="display: none;" name="aux">
                                 <input type="text" value="'.$nicknameUser2.'" style="display: none;" name="nick">
                                <input type="text" value="'.$qndClicar.'" style="display: none;" name="qndClicar">
                                <input id="add" type="submit" value="" name="X" style="margin-top:-100px;">
                            </form>
                        ';
                        echo '<script>mudar(\''.$add.'\')</script>';
                        ?>
                        
                        
                    </div>
                    
                    <div id="nameProfile"><center><?php if (strlen($nameUser2) > 15 || strlen($lastNameUser2) > 10 && strlen($nameUser2) > 5) {
            echo '<script>document.getElementById("nameProfile").style.fontSize = "15px";</script>';
        }echo $nameUser2 . ' ' . $lastNameUser2 ?></center></div>
                    <div id="nicknameProfile"><center><span style="color: dodgerblue;">*</span> <?php echo $nicknameUser2 ?> <span style="color: dodgerblue;">*</span></center></div>
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
                    <div id="insurerPhotos">
                        <div class="photosProfile"></div>
                        <div class="photosProfile"></div>
                        <div class="photosProfile"></div>
                        <div class="photosProfile"></div>
                        <div class="photosProfile"></div>
                        <div class="photosProfile"></div>
                    </div>
                </div>
            </div>

            <div id="insurerRight">
                <div id="centralizer" style="margin-top:0px;">
                    <div id = "caixaPostar">
                <div class = "barLeftPostar">
                    <a href="myProfile.php"><div class = "fotoPostar" ><img src = "<?php echo $photoUser?>" class = "normal"></div></a>
                </div>
                <div id = "postar">
                    <form name = "postar" method = "post" action = "insertPost2.php" enctype="multipart/form-data">

                        <textarea name = "post" id = "inputPostar" rows = "2" cols = "10" placeholder = "Sintetize suas ideias aqui."></textarea>
                        <div id = "areaInferiorPostar">
                        

                       <input type="file" name="image" class="file" />
                        <div class="fakefile">
                            <img src="imagens/icones/IconesPublicar/cam.png" />
                        </div>

                        <input type="file" name="film" class="file" />
                        <div class="fakefile" style ="left: 26px;">
                            <img src="imagens/icones/IconesPublicar/filmadora.png" />
                        </div>

                        <input type="file" name="local" class="file" />
                        <div class="fakefile" style ="left: 53px;">
                            <img src="imagens/icones/IconesPublicar/local.png" />
                        </div>

                        <input type = "submit" id = "pubblish" value = "" name = "enviar">
                        </div>
                    </form>
                </div>
            </div>

                    <?php
                    include_once ('./connectionBD.php');
            // conversao das datas
            // aqui conecta no banco
            //arrumei aqui, pq nessa page tem q aparecer post de geral n so do user
            $sql = ("select * from tbPost where idUser='$idUser2' order by idPost desc");  // faz o select das postagem da última para a primeira
            $result = mysqli_query($conn, $sql); // executa a query

            while ($linha = mysqli_fetch_array($result)) {  // pega todos os dados da tabela e coloca em um array     
                // pega todas as datas e formata 
                
                $date = $linha["datePost"];
                $day = substr($date, 8, 9);
                $month = substr($date, 5, 8);
                $month2 = substr($month, 0, 2); // tive que fazer isso, não sei o porque, mais funfa kkkk
                $year = substr($date, 0, 4);

                $mes_extenso = array(
                    '01' => 'Jan',
                    '02' => 'Fev',
                    '03' => 'Mar',
                    '04' => 'Abr',
                    '05' => 'Mai',
                    '06' => 'Jun',
                    '07' => 'Jul',
                    '08' => 'Ago',
                    '09' => 'Nov',
                    '10' => 'Set',
                    '11' => 'Out',
                    '12' => 'Dez'
                );
                $aux = $linha['idUser'];
            $sql = ("select * from tbUser where idUser = '$aux'");  
            $resultin = mysqli_query($conn, $sql); // executa a query
            $resultUser=mysqli_fetch_assoc($resultin);
                echo '<div class="post">
                <div class="barLeft">
                    <div class="fotoPost" ><img src="'.$resultUser['photoUser'].'" class="normal"></div>
                    <div class="heart"></div>
                    <div class="reblog"></div>
                </div>
                <div class="caixaPost">
                    <div class="nomeUserPost"><b>' . $resultUser['nameUser']/* pega o nome do carinha do banco */ . ' ' . $resultUser['lastNameUser'] /* pega o sobrenome do carinha do banco */ . '</b> <font size="3" color="#a0a0a0"><i>';
                    if(!empty($linha['photoPost'])) {
                    echo'adicionou uma nova foto.';
                    } else {
                    echo'adicionou um novo status.';
                    }
                    echo'</i></font></div>
                    <div class="conteudoPost">
                        ' . $linha["textPost"]/* o texto do post */ . '
                    </div>';
                if(!empty($linha['photoPost'])) {
                    echo'
                        <div class="imagemPost">
                           <img src="'.$linha['photoPost'].'">
                     </div>';
                }
                
                echo'
                    <div class="commentBox">
                    </div>
                    <div class="fazerComentario">
                        <div class="comentarFoto"><img src="'.$photoUser.'" class="normal"></div>
                        <form name="comentario">
                            <textarea name="comentando" class="comentarTexto" rows="2" cols="10" placeholder="Escreva um comentário"></textarea>
                        </form>
                    </div>
                </div>
                <div class="barRight">
                    <div class="data">
                        <center>
                            <font style="font-size:22px;  color: #727272;">' . $day . '</font><br>
                            <font style="font-size:12px; color: #727272;">' . $mes_extenso[$month2] . '</font><br>
                            <font style="font-size:12px; color: #727272;">' . $year . '</font>
                        </center>
                    </div>
                    <div class="linhaPost"></div>
                </div>
            </div>';
            }
            closeConnection($conn); // fecha a conexão
                    ?>
                </div>
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

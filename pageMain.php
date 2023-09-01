<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Synth's faça sua synth's conosco</title>
        <link href="css/style/stylePattern.css" rel="stylesheet" type="text/css"/>
        <link href="css/style/stylePageMain.css" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" type="text/css" href="css/lightview/lightview.css" />


        <meta name="description" content="Rede Social com o objetivo de juntar as ideias">
        <meta name="keywords" content="">

    </head>
    <?php

    /* session_start(); */

    include_once ('./checkSession.php');
    include_once ('./connectionBD.php');
    include_once ('./pickUpData.php');
    include_once ('./checkNotifications.php'); //ARRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRUMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAR
    $conn = openConnection();

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
    <body>

        <!--INICIO DO HEADER-->
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
        <!--FIM DO HEADER, mas nao esqueca de colar os scripts dele lá em baixo!-->

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
            ?>
            </div></a>
            <a href="#"><div class="option"><img class = "option" src = "imagens/icones/IconesBarraEsquerda/iconGames.png" width = "100%" height = "100%" title = "Games"></div></a>
        </div>
        <div id = "centralizer">
            <div id = "caixaPostar">
                <div class = "barLeftPostar">
                    <a href="myProfile.php"><div class = "fotoPostar" ><img src = "<?php echo $photoUser?>" class = "normal"></div></a>
                </div>
                <div id = "postar">
                    <form name = "postar" method = "post" action = "insertPost.php" enctype="multipart/form-data">

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
            $sql = ("SELECT * from tbPost order by idPost desc");  // faz o SELECT das postagem da última para a primeira
            $result = mysqli_query($conn, $sql); // executa a query

            while ($linha = mysqli_fetch_array($result)) {  // pega todos os dados da tabela e coloca em um array     
                // pega todas as datas e formata 
            $aux = $linha['idUser'];
            $sql1 = ("SELECT * from tbAmigos  where ((idUser = '$aux' or idAmigo = '$aux') and status=3 and (idUser ='$idUser' or idAmigo='$idUser'))");  // faz o SELECT das postagem da última para a primeira
            $result1 = mysqli_query($conn, $sql1); // executa a query
            $result2 = mysqli_fetch_array($result1);

            if(empty($result2) && $aux != $idUser) continue;
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
                    '09' => 'Set',
                    '10' => 'Out',
                    '11' => 'Nov',
                    '12' => 'Dez'
                );
                
            $sql = ("SELECT * from tbUser where idUser = '$aux'");  
            $resultin = mysqli_query($conn, $sql); // executa a query
            $resultUser=mysqli_fetch_assoc($resultin);
                echo '<div class="post">
                <div class="barLeft">';
                if($resultUser['idUser']==$idUser) {
                	echo'    <a href="myProfile.php"><div class="fotoPost" ><img src="'.$resultUser['photoUser'].'" class="normal"></div> </a>
                ';
                } else {
                	echo'    <a href="./profile.php?nicknameUser='.$resultUser['nicknameUser'].'"><div class="fotoPost" ><img src="'.$resultUser['photoUser'].'" class="normal"></div> </a>
                ';
                }
                
                echo'
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
                    $TamanhoImagem = getimagesize($linha['photoPost']);
                    $wid=$TamanhoImagem[0];
                    $hei=$TamanhoImagem[1];
                    echo'
                        <div class="imagemPost">
                           
                           <a href="'.$linha['photoPost'].'" class="lightview" data-lightview-group="'.$linha['idPost'].'" data-lightview-title="'.$resultUser['nameUser'].'" data-lightview-caption="'.$linha['textPost'].'">
   						 <img src="'.$linha['photoPost'].'" alt=""/>
 						 </a>
                     </div>

                     ';

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

        <!-- fica em cima do commentBox<div class="imagemPost">
            <img src="imagens/pubTeste.jpg">
        </div>!-->

        <br>
        <br>
        <br>
        <!--<form name="enviarDados" method="post" action="">
            <input type="text" name="post">
            <input type="submit" name="enviar">
        </form>-->

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

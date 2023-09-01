<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Synth's faça sua synth's conosco</title>
        <link href="css/style/stylePattern.css" rel="stylesheet" type="text/css"/>
        <link href="css/style/styleIndex.css" rel="stylesheet" type="text/css"/>
        <meta name="description" content="Rede Social com o objetivo de ajuntar as idéias">
        <meta name="keywords" content="">
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>
        <script src="js/validation.js" type="text/javascript"></script>
        <script src="js/changeBackground.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script>
            $(function () {
                setTimeout(function () {
                    $('#content').fadeIn();
                }, 1500);
            });
            $(function () {
                setTimeout(function () {
                    $('.buttonRegister').fadeIn();
                }, 1800);
            });
        </script>
    </head>
    <?php
    session_start();
        include_once './checkSessionEmail.php';
    ?>
    <body onload="chargeWallpaper()">
        <div id="header" style="background: transparent;">
            <div class="sizeHeaderContainer headerIndexSize" style="position: relative; right: 40px;">
                <div class="miniLogo" title="Synth's suas ideias"></div>
                <a href="createAccount.php"><div class="buttonRegister" title="Cadastra-se agora ;)"></div></a>
            </div>
        </div>
        <div id="container" style="right: 0;">
            <div id="content" style="display: none;">
                <div class="logoMain"></div>
                <div class="nameNetwork"></div>
                <div id="inputs">
                    <form id="validatePassword" name="pegarDados" method="post" action="checkPassword.php">
                        <input class="buttonSend" type="submit" value="" title="Verificar Senha">
                        <input class="inputPassword" type="password" name="password" placeholder="Digite sua senha" required>
                    </form>
                </div>
                <a href="index.php" title="Voltar"><img src="imagens/icones/IconesLogarCadastrar/setaVoltar.png" class="backEmail"></a>
            </div>
        </div>
        <div class="effectBlack"></div>
        <div id="cc">© 2017 Synth's Inc. Todos os direitos reservados</div>
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="js/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>







<!--<div id="container" style="right: 0;">
    <div id="content" style="display: none;">
        <div class="logoMain"></div>
        <div class="nameNetwork"></div>
        <div id="inputs">
            <form id="validatePassword" name="pegarDados" method="post" action="checkPassword.php">
                <input class="buttonSend" type="submit" value="">
                <input style="margin-top: 0px;" class="inputPassword" type="password" name="password" placeholder="Digite sua senha" required>
            </form>
        </div>
        <a href="index.php" title="Voltar"><img src="imagens/icones/IconesLogarCadastrar/setaVoltar.png" class="backEmail"></a>
    </div>
</div>-->

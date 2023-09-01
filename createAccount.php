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
        <link href="css/style/styleIndex.css" rel="stylesheet" type="text/css"/>
        <link href="css/style/styleCreateAccount.css" rel="stylesheet" type="text/css"/>
        <meta name="description" content="Rede Social com o objetivo de ajuntar as idéias">
        <meta name="keywords" content="">
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.js" type="text/javascript"></script>
        <script src="js/validation.js"></script>
        <script src="js/changeBackground.js" type="text/javascript"></script>
        <script src="https://raw.github.com/danpalmer/jquery.complexify.js/master/jquery.complexify.js"></script>
    </head>
    <body onload="chargeColorWallpaper()">
        <div id="header" style="background: transparent;">
            <a href="index.php"><div class="buttonLogin" title="Entrar ;D"></div></a>
        </div>
        <div id="container" style="right: 0; margin-top: 15px;">
            <div id="content">
                <div class="logoMain" style="margin-top: -20px;"></div>
                <div class="nameNetwork"></div>
                <div id="insurerInputs">
                    <form id="dataRecorder" name="pegarDadosCadastro" method="post" action="checkData.php">
                        <div id="corError" class="tamanho" style="float: left;"><input class="inputName" type="text" name="registeredName" placeholder="Nome" required></div>
                        <div id="corError" class="tamanho" style="float: right;"><input class="inputLastName" type="text" name="registeredLastName" placeholder="Sobrenome" required></div>
                        <div id="corError"><input style="width: 283px; margin-bottom: 3px;" class="inputEmail" type="email" name="registeredEmail" placeholder="Email" required></div>
                        <div id="corError"><input style="width: 283px;" id="password" class="inputPassword" type="password" name="registeredPassword" placeholder="Senha" required></div>
                        <div id="corError"><input style="width: 283px;" class="inputPasswordAgain" type="password" name="registeredPassword2" placeholder="Sua senha novamente" required></div>
                        <div id="corError"><input style="width: 283px;" class="inputNickname" type="text" name="registeredNickname" placeholder="Nickname" required></div>
                        <div id="corError"><input style="margin-left: -200px; margin-right: 4px;" type="radio" name="registeredGenre" checked value="masculino">Masculino</div>
                        <div id="corError"><input style="margin-left: -10px; margin-right: 4px; position: relative; top: -19px;" type="radio" name="registeredGenre" value="feminino"><span style="position: relative; top: -19px;">Feminino</span></div>
                        <center><input class="buttonSend2" type="submit" value=""></center>
                    </form>
                </div>
            </div>
        </div>
        <div class="effectBlack"></div>
        <div id="cc">© 2017 Synth's Inc. Todos os direitos reservados</div>
    </body>
</html>

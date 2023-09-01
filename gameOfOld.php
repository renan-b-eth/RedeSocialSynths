<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Synth's jogo da velha</title>
        <link href="css/style/styleGameOfOld.css" rel="stylesheet" type="text/css"/>
        <link href="css/style/stylePattern.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body style="background: #121212;">
        <script type  = "text/javascript">
            var contX = 0;
            var contO = 0;

            function resetar(){
            	location.reload();
            }

            function venceu() {
                //x ganhou
                if ((btn1.value == "x") && (btn2.value == "x") && (btn3.value == "x") ||
                        (btn4.value == "x") && (btn5.value == "x") && (btn6.value == "x") ||
                        (btn7.value == "x") && (btn8.value == "x") && (btn9.value == "x") ||
                        (btn1.value == "x") && (btn4.value == "x") && (btn7.value == "x") ||
                        (btn2.value == "x") && (btn5.value == "x") && (btn8.value == "x") ||
                        (btn3.value == "x") && (btn6.value == "x") && (btn9.value == "x") ||
                        (btn1.value == "x") && (btn5.value == "x") && (btn9.value == "x") ||
                        (btn3.value == "x") && (btn5.value == "x") && (btn7.value == "x")) {
                    contX++;
                    document.getElementById("pontosX").innerHTML = "X - " + contX;
                    document.getElementById("jogador2").innerHTML = "Jogador X ganhou!!!";
                    for (var i = 1, max = 10; i < max; i++) {
                        var id = "btn" + i;
                        document.getElementById(id).disabled = true;
                    }
                    continuar();
                } else if ((btn1.value == "o") && (btn2.value == "o") && (btn3.value == "o") ||
                        (btn4.value == "o") && (btn5.value == "o") && (btn6.value == "o") ||
                        (btn7.value == "o") && (btn8.value == "o") && (btn9.value == "o") ||
                        (btn1.value == "o") && (btn4.value == "o") && (btn7.value == "o") ||
                        (btn2.value == "o") && (btn5.value == "o") && (btn8.value == "o") ||
                        (btn3.value == "o") && (btn6.value == "o") && (btn9.value == "o") ||
                        (btn1.value == "o") && (btn5.value == "o") && (btn9.value == "o") ||
                        (btn3.value == "o") && (btn5.value == "o") && (btn7.value == "o")) {
                    contO++;
                    document.getElementById("pontosO").innerHTML = "O - " + contO;
                    document.getElementById("jogador2").innerHTML = "Jogador O ganhou!!!";
                    for (var i = 1, max = 10; i < max; i++) {
                        var id = "btn" + i;
                        document.getElementById(id).disabled = true;
                    }
                    continuar();
                } else if ((btn1.value != "") && (btn2.value != "") && (btn3.value != "") && (btn4.value != "")
                        && (btn5.value != "") && (btn6.value != "") && (btn7.value != "") && (btn8.value != "")
                        && (btn9.value != "")) {
                    document.getElementById("jogador2").innerHTML = "Deu Velha ;(";
                    continuar();
                }
            }
            var nJogadas = 0;
            function jogada(btn) {
                if (btn.value != "x" && btn.value != "o") {
                    if (nJogadas % 2 == 0) {
                        btn.value = "x";
                        if (btn.value == "x") {
                            document.getElementById(btn.id).style.background = "url('imagens/Jogos/Velha/1.png')";
                            document.getElementById(btn.id).style.color = "transparent";
                            document.getElementById(btn.id).disabled;
                            ;
                        }
                        $("#jogador").html("Vez do Jogador(a) O");
                    } else {
                        btn.value = "o";
                        if (btn.value == "o") {
                            document.getElementById(btn.id).style.background = "url('imagens/Jogos/Velha/2.png')";
                            document.getElementById(btn.id).style.color = "transparent";
                            document.getElementById(btn.id).disabled;
                        }
                        $("#jogador").html("Vez do Jogador(a) X");
                    }
                    nJogadas++;
                    setInterval(function(){ venceu(); }, 3500);
                }
            }

            function continuar() {
                btn1.value = "";
                btn2.value = "";
                btn3.value = "";
                btn4.value = "";
                btn5.value = "";
                btn6.value = "";
                btn7.value = "";
                btn8.value = "";
                btn9.value = "";
                for (var i = 1, max = 10; i < max; i++) {
                    var id = "btn" + i;
                    document.getElementById(id).disabled = false;
                    document.getElementById(id).style.background = "transparent";
                    document.getElementById(id).style.color = "transparent";
                }
            }
        </script>

        <div id="jogador">
            Vez do Jogador(a) X
        </div>

        <div id="game">
            <div id="pontosX">X - 0</div>
            <div id="pontosO">O - 0</div>
            <div id="jogador2">Jogando ...</div>
            <input type="button" id="btn1" class="btnVelha" onclick="jogada(this)"/>
            <input type="button" id="btn2" class="btnVelha" onclick="jogada(this)"/>
            <input type="button" id="btn3" class="btnVelha" onclick="jogada(this)"/>
            <br>
            <input type="button" id="btn4" class="btnVelha" onclick="jogada(this)"/>
            <input type="button" id="btn5" class="btnVelha" onclick="jogada(this)"/>
            <input type="button"  id="btn6" class="btnVelha" onclick="jogada(this)"/>
            <br>
            <input type="button"  id="btn7" class="btnVelha" onclick="jogada(this)"/>
            <input type="button"  id="btn8" class="btnVelha" onclick="jogada(this)"/>
            <input type="button"  id="btn9" class="btnVelha" onclick="jogada(this)"/>

            <input type="button" id="reiniciar" value="Resetar" name="resetar" onclick="resetar();">
        </div>
        <a href="pageMain.php"><div class="voltar"></div></a>
    </body>
</html>

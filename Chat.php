<html>
<head>

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link href="css/style/stylePattern.css" rel="stylesheet" type="text/css"/>
</head>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }
    #area {
        margin-top: 60px;
        width: 100%;
        height: 90%;
    }
    #sidebar {
        height: 100%;
        width: 25%;
        background: green;
        float: left;
    }
    #myDIV {
        height: 100%;
        width: 75%;
        background: blue;
        overflow: auto;

    }
    .bolinha2 {
        width: 100px;
        background: red;
    }
    .divs {
        border: 1px solid;
        border-radius: 9px;
        text-align: center;
        padding-top: 10px;
        padding-bottom:10px;
        padding-left: 3px;
        padding-right: 3px;
        border-color: #cccccc;
        font-family: 'SSemibold';
        font-size: 13px; 
        color: #44b7da;
        width: 100px;
        height: 100px;
        float: left;
    }
</style>
<script>
    var myId;
    function myFunction() {
        var elmnt = document.getElementById("myDIV");
        elmnt.scrollTop += myDIV.scrollHeight;
    }
    function atualizar()
    {
        // Fazendo requisição AJAX
        $.post('atualizarChat.php', function (vet) {
            // Exibindo frase
            var conversa = "";

            vet.forEach(function(entry) {   

                conversa+= "<div class='bolinha2'>"+entry.texto+"</b></div>" +"<div align='left'>"+entry.autor+"</div></left><br/>";

            });
            $('#conversa').html(conversa);

            //}, 'JSON');
        },'JSON')


    }

    // Definindo intervalo que a função será chamada
    setInterval("atualizar()", 2000);
    setTimeout("myFunction()", 10);

    // Quando carregar a página
    $(function() {
        // Faz a primeira atualização
        atualizar();
        myFunction();
    });
    function getChat(e){
    $.ajax({
        type : 'GET',
        url : 'setSession.php',
        data: {
            user : '2',

              },
        success : function(data){
            
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert ("Error Occured");}
                 });


};

  /*  function getChat(e)
    {
        atualizar();
        myFunction();
    }*/
    $(document).ready(function(e) {
        var $radios = $(':radio'), //cached reference to radios elements
        $divs = $radios.parent(); //the divs are the parent element of radio
        $radios.bind('change', function() {
            var $this = $(this),
            $div = $this.parent();
            $div.css('background-color', this.checked ? '#cccccc' : '#ffffff');
            $divs.not($div).css('background-color', '#ffffff');
        });
    });
</script>

    <?php

    /* session_start(); */

    include_once ('./checkSession.php');
    include_once ('./connectionBD.php');
    include_once ('./pickUpData.php');
    include_once ('./checkNotifications.php'); //ARRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRUMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAR
    $conn = openConnection();

    ?>
<body>
        <?php

        $_SESSION['idUser']=1;
        
        ?>

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

        <div id="area">
            <div id="sidebar">

                <div>
                  <label>
                    <div class="divs" style="background-color: #ccc;">
                        cesar
                        <input type="radio" value="1" name="abc" style="visibility:hidden;" onClick="getChat(this)" />

                    </div>
                </label>
                <label>
                    <div class="divs" style="background-color: #fff;">
                        joelma
                        <input type="radio" value="2" name="abc" style="visibility:hidden;" onClick="getChat(this)" />

                    </div>
                </label>
                <label>
                    <div class="divs" style="background-color: #fff;">
                        jose
                        <input type="radio" value="2" name="abc" style="visibility:hidden;" onClick="getChat(this)" />

                    </div>
                </label>
            </div> 

        </div>
        <div id="myDIV">
           <div id="conversa">

           </div>

       </div>
   </div>
   <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
   <script type="text/javascript" src="js/swfobject.js"></script>
   <script type="text/javascript" src="js/spinners/spinners.min.js"></script>
   <script type="text/javascript" src="js/lightview/lightview.js"></script>

   <script src='js/jquery.marquee.js'></script>
   <script src="js/marquee.js"></script>
<?php print_r($_SESSION);  ?>
</body>
</html>

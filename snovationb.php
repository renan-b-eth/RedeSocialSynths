
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Slide de imagens  com Jquery</title>

	<style>

		*{margin:0;padding:0}
		.pattern{
			margin:auto;
			border:2px solid #CCC;
			padding:10px;
			height: 500px;
			width: 500px;
			margin-top:50px;
			border-radius:5px;
			position: absolute;
		}
		.outer {
			display: table;
			position: absolute;
			height: 100%;
			width: 100%;
		}
		.middle {
			display: table-cell;
			vertical-align: middle;
			z-index: 0;
		}
		.image {
			border-color: #f57743;
			border-style: solid;
			border-width: 5px;
			margin:0 auto;

		}

		.pattern ul{
			margin:0;
			padding:0;
			list-style:none;

		}
		body {
			background: url('imagens/Wallpapers/backStories.png');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}

		.voltar {
			position: absolute;
			left: -50px;
			top:230px;
			opacity: 0.3;

		}
		.voltar:hover {
			opacity: 0.6;
		}
		.ir {
			position: absolute;
			right: -50px;
			top:230px;
			opacity: 0.3;
		}
		.ir:hover {
			opacity: 0.6;
		}
		#hold {
			width: 100%;
			position: fixed;
			height: 105px;
			z-index: 1;
			position: absolute;
			top: 0;
			background-color: #111111;
			overflow: hidden;
			outline: 0;
		}

		.historia {

			background: none;
			border: none;
			cursor: pointer;
			display: inline-block;
			margin-right: auto;
			text-align: center;
			vertical-align: top;
			width: 80px;
			height: 80px;
			margin-top: 5px;

		}
		.picHistoria {
			width: 80%;
			height: 80%;
			border-color: gray;
			border-style: solid;
			border-width: 3px;
			margin-left: 7px;
			border-radius: 100%;
			overflow: hidden;
			float: left;
		}
		.nameHistoria {
			width: 100%;
			height: 12%;
			padding-top: 2px;
			color: white;
			/*background-color: black;*/
			float: left;
			text-align: center;
			font-size: 11px;
			font-family: 'Adria Grotesk';
		}
		#sombra {
			width: 100%;
			height: 100%;
			background-color: black;
			position: absolute;
			opacity: 0.96;
			top:0;
			display: none;
			z-index: 10;
		}
		#l {
			opacity: 0.6;
			transition: 0.5s;
		}
		#r {
			opacity: 0.8;
			transition: 0.6s;
		}
		.insurerDataSlide { /*dataaquiserefereaDADOS*/
			position: absolute;
			background: url('imagens/sombra.png');
			z-index: 12;
			width: 100%;
			height: 50px;
		}
		.photoUserSlide {
			background: white;
			width: 50px;
			height: 50px;
			border-radius: 100%;
			float: left;
			margin-right: 10px;
			border-style: solid;
			border-width: 2px;
			border-color: white;
			overflow: hidden;

		}
		.nameUserSlide {
			float: left;
			background: ;
			width: 350px;
			font-family: 'Corbel';
			line-height: 15px;
			height: 35px;
			z-index: 11;
			color: white;
			margin-top: 8px;
		}
		.horario {
			background: ;
			font-family: 'Corbel';
			color: white;
			font-size: 12px;
			position: absolute;
			left:65px;
			top: 25px;
		}
		#logo {
			background: url('imagens/iconsstories/logostories.png');
			width: 358px;
			height: 117px;
			margin:auto;
			margin-top: -200px;
		}
	</style>
	<?php
	//include_once("./checkSession.php");
	include_once("./connectionBD.php");
	include_once("./pickUpData.php");
	$conn = openConnection();
	?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jcycle.js"></script>
	<script src="js/dw_scroll_c.js" type="text/javascript"></script>
	<script src="js/bc_controls.js" type="text/javascript"></script>

	<script type="text/javascript">
	window.onresize = function(event) {/*essa função da refresh no site toda vez que a pessoa redimensiona, pra n dar bug nos bang */
		window.location.reload()
	};
		function opa(id) {
			document.getElementById(id).style.opacity = "1"; 
		}
		function opabye(id) {
			document.getElementById(id).style.opacity = "0.6"; 
		}
		var fehei=0;
		var time;
		function mudar(quem,cod) {
			document.getElementById(quem).style.display = "none"; 
			document.getElementById('prox'+cod).style.display = "none";
			document.getElementById('ant'+cod).style.display = "none";
			document.getElementById('sombra').style.display = "none";
			fehei=1;
			clearTimeout(time);

			
		}
/*function onAfter(curr, next, opts) {
    var Left = $(opts.prev); // Fetches selector from .cycle options (ex. #prev)
    var Right = $(opts.next); // Fetches selector from .cycle options (ex. #next)
  
    var index = opts.currSlide;
    index == 0 ? Left.css('visibility','hidden') : Left.css('visibility','visible');
    index == opts.slideCount - 1 ? Right.css('visibility','hidden') : Right.css('visibility','visible');
}*/
var contando=0;
var cont=0;

function onBefore(curr, next, opts) {
	/*for(var key in opts) {
    var value = opts[key];
    alert(key);
}*/
	//document.getElementById('pattern').style.height = "hidden";
	var str = opts.prev;
	var len =str.length;
	var res = str.substring(1, len); 
	if((opts.currSlide==0  && contando==0) ||  (opts.nextSlide==0  && contando==0)) {
		document.getElementById(res).style.visibility = "hidden";

	} else {
		document.getElementById(res).style.visibility = "visible";
	}
	contando++;
}

function tabsanim(nome, ref){

	aux ='#'+nome+' ul';
	prox='#prox'+ref;
	ant='#ant'+ref;
	auxli = '#'+nome+' li';
	var prox1=prox.substring(1, prox.length); 
	var ant1=ant.substring(1, ant.length); 
	document.getElementById(prox1).style.display = "block";
	document.getElementById(ant1).style.display = "block";
	document.getElementById('sombra').style.display = "block"; 
	var n = $(auxli).length;
	if( n == 1) {
		
		function oi() {
			
			document.getElementById(nome).style.display = "block";
			time=setTimeout(function(){
				document.getElementById(nome).style.display = "none";
				if(fehei!=1) {

					document.getElementById('sombra').style.display = "none"; 
				}
				
			}, 3000);

		}
		oi();
	} else {
		$(aux).cycle({
			fx: 'none',
			height:'auto',
			timeout: 3000,
			next: prox,
			after: function () {
				//alert(contando);
				cont+=1;

				if(cont>n && contando>n) {
					$(aux).cycle('destroy');
					document.getElementById(nome).style.display = "none";
					document.getElementById(prox1).style.display = "none";
					document.getElementById(ant1).style.display = "none";
					document.getElementById('sombra').style.display = "none"; 


				}
				
			},
			end: function () {


				if(cont>=n && contando>=n) {

					$(aux).cycle('destroy');
					document.getElementById(nome).style.display = "none";
					document.getElementById(prox1).style.display = "none";
					document.getElementById(ant1).style.display = "none";
					document.getElementById('sombra').style.display = "none"; 
				}
			},			prev: ant,
			before: onBefore,
			
		})
	}
	
	
	
}
function sub() {
	contando-=2;
	if(contando<=-1) {
		alert('fecha');

	}

	//alert('contado= '+contando);

}

function resettabs(nome ,ref) {
	contando=0;
	fehei=0;
	cont=0;
	aux ='#'+nome+' ul';
	aux2='tabsanim("'+nome+'","'+ref+'")';
	$(aux).cycle('destroy');
	setTimeout(aux2,0);
	document.getElementById(nome).style.display = "block";
}
function init_dw_Scroll() {
    // arguments: id of scroll area div, id of content div
    var wndo1 = new dw_scrollObj('hold', 'lyr1');
    wndo1.setUpScrollControls('scroll_maps_h');

}

// if code supported, link in the style sheet (optional) and call the init function onload
if ( dw_scrollObj.isSupported() ) {
    //dw_Util.writeStyleSheet('css/speed_opts.css');
    dw_Event.add( window, 'load', init_dw_Scroll);
}
</script>

</head>

<body>

<?php
//FORMATO ANO MES DIA
/*
$datatime1 = new DateTime('2015/04/15 00:00:00');
$datatime2 = new DateTime('2015/04/16 00:00:00');

$data1  = $datatime1->format('Y-m-d H:i:s');
$data2  = $datatime2->format('Y-m-d H:i:s');

$diff = $datatime1->diff($datatime2);
$horas = $diff->h + ($diff->days * 24);

echo "A diferença de horas entre {$data1} e {$data2} é {$horas} horas";
*/
?>
	<form name = "postarS" method = "post" action = "insertS.php" enctype="multipart/form-data" style="z-index: 8; position: absolute; top:230px;">
		<input type="file" name="image" class="file" />
		<input type = "submit" name = "enviar">
	</form>
	<div id="sombra"></div>
	<?php
	$name='joelma';
$sql = ("SELECT DISTINCT tbUser.nicknameUser, tbUser.lastNameUser, tbuser.idUser, tbuser.nameUser, tbUser.photoUser FROM tbUser, tbImage, tbAmigos WHERE tbImage.idUser=tbuser.idUser and ((tbimage.idUser = tbamigos.idAmigo AND tbamigos.idUser = '$idUser' AND tbamigos.status =3) OR (tbimage.idUser = tbamigos.idUser AND tbamigos.idamigo = '$idUser' AND tbamigos.status= 3))");  // faz o select das postagem da última para a primeira
$users=0;
            $result = mysqli_query($conn, $sql); // executa a query

            while ($linha = mysqli_fetch_array($result)) {
            	//if user eh AMIGOOOOOOOOOOOOOOOOOOOOOOOO DEPOIS ACRESCENTA CONTADOR
            	$idAmigo=$linha['idUser'];
				$sql1 = ("select * from tbImage  where idUser ='$idAmigo'");  // faz o select das postagem da última para a primeira
            	$result1 = mysqli_query($conn, $sql1); // executa a query
				$sql4 = ("select count(idImage) from tbImage  where idUser ='$idAmigo'");  // faz o select das postagem da última para a primeira
            	$result4 = mysqli_query($conn, $sql4); // executa a query
            	$result4fim=mysqli_fetch_array($result4);

            	if($users==0) {
            			$sqla = ("SELECT DISTINCT tbUser.nicknameUser, tbUser.photoUser, tbuser.idUser, tbuser.nameUser FROM tbUser, tbimage, tbamigos WHERE tbImage.idUser=tbuser.idUser and ((tbimage.idUser = tbamigos.idAmigo AND tbamigos.idUser = '$idUser' AND tbamigos.status =3) OR (tbimage.idUser = tbamigos.idUser AND tbamigos.idamigo = '$idUser' AND tbamigos.status= 3))");  // faz o select das postagem da última para a primeira
					 	$resulta = mysqli_query($conn, $sqla); // executa a query
					 	echo'<div id="hold"><div id="lyr1"> 
					 	<table border="0" cellpadding="6" cellspacing="0"><tr><td><div class="a" style="width: 35px;height: 100%;"></div></td>';
					 		while ($linhaa = mysqli_fetch_array($resulta)) {
					 			$idUser5=$linhaa['idUser'];
					 			$sql5 = ("select count(idImage) from tbImage  where idUser ='$idUser5'");
	            			$result5 = mysqli_query($conn, $sql5); // executa a query
	            			$result5fim=mysqli_fetch_array($result5);
        			
	            				echo'
	            				<td><a href="#" onclick="resettabs(\''.$linhaa['nicknameUser'].'\',\''.$linhaa['idUser'].'\')"><div class="historia"><div class="picHistoria" style="border-color: #fc5800;"><img src="'.$linhaa['photoUser'].'" width="100%"></div><div class="nameHistoria">'.$linhaa['nameUser'].'</div></div></a></td>';

	            			
	            		}
	            		echo'<td><div class="b" style="width: 40px; height: 100%;"></div></td></tr>
	            	</table>
	            </div>

	            <img src="imagens/arrow_left2.png" width="40" height="105" alt="" border="0" usemap="#lftaro" id="l" style=" position:absolute; left:0px;">
	            <img src="imagens/arrow_right2.png" width="40" height="105" alt="" border="0" usemap="#rtaro" id="r" style=" position:absolute; right:0px;">
	        </div>';
	    }
	    
	    $users=1;
              // pega todos os dados da tabela e coloca em um array     
	    
	    echo'<div class="outer">
	    <div class="middle">
	    	<div id="'.$linha['nicknameUser'].'" style ="display:none; background-color: ;" >
	    	<div class="insurerDataSlide">
	    		<div class="photoUserSlide"><img src="'.$linha['photoUser'].'" width="100%"></div>
		    	<div class="nameUserSlide">'.$linha['nameUser'].' '.$linha['lastNameUser'].' <br>
		    	</div>
	    	</div>
	    		<style>
						#'.$linha['nicknameUser'].' { margin:  auto; padding: 0; background-color: ; position: relative; z-index:11;}
						#slide { margin: 0; padding: 0 }
						#'.$linha['nicknameUser'].', #slide { height: 500px; width: 500px; }
						#slide img { padding: 15px; border: 1px solid #ccc; background-color: #eee; margin: auto; display: block; }
						#'.$linha['nicknameUser'].' ul{ 	list-style:none; height: 500px; width: 500px;}
	    		</style>
	    		<ul>';
	    			while ($linha2 = mysqli_fetch_array($result1)) {
	    				$origem = $linha2['image'];
	    				$idImage = $linha2['idImage'];
	    				$TamanhoImagem = getimagesize($linha2['image']);
	    				$wid=$TamanhoImagem[0];
	    				$hei=$TamanhoImagem[1];/*****************ARRUMAR HORAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA*************//////////
	    				
						$datatime1 = new DateTime($linha2['dataImage']);
						$datatime2 = new DateTime('now');
						$aa  = $datatime2->format('Y-m-d H:i:s');

						$diff = $datatime1->diff($datatime2);
						$difHoras = $diff->h + ($diff->days * 24);
						if($difHoras==0) {
						echo '<li>
	    				<div class="horario">Há alguns minutos</div>';

						} else if($difHoras>=24) {
							$sqlDelete = ("delete from tbImage where idImage = '$idImage'");
	            			$resultDelete = mysqli_query($conn, $sqlDelete); // executa a query
	            			continue;
						} else {
							echo '<li>
	    				<div class="horario">Há '.$difHoras.' horas</div>';
						}
	    				
	    				if($result4fim['count(idImage)']==1) {
							if($wid>$hei) {
	    						echo'
	    						<center>
	    							<img src="'.$origem.'" alt="'.$origem.'" title="aaa" width="100%" style="margin-top: '.((500-$hei)/2).'px;"/></center>
	    						';
	    					} else if ($hei>$wid){
	    						echo'
	    						<center>
	    							<img src="'.$origem.'" alt="'.$origem.'" title="'.$origem.'"  height="100%"/></center>
	    						';
	    					} else {
	    						echo'
	    						<center>
	    							<img src="'.$origem.'" alt="'.$origem.'" title="'.$origem.'" style="margin-top: '.((500-$hei)/2).'px;"/></center>
	    						';
	    					}

	    				} else {
	    					if($wid>$hei) {
	    						echo'
	    						<center>
	    							<img src="'.$origem.'" alt="'.$origem.'" title="aaa" width="100%" style="margin-top: '.((500-$hei)/2).'px;"/></center>
	    						';
	    					} else if ($hei>$wid){
	    						echo'
	    						<center>
	    							<img src="'.$origem.'" alt="'.$origem.'" title="'.$origem.'"  height="100%" style="margin-left: '.((500-$wid)/2).'px;"/></center>
	    						';
	    					} else {
	    						echo'
	    						<center>
	    							<img src="'.$origem.'" alt="'.$origem.'" title="'.$origem.'"  height="100%" style="margin-left: '.((500-$wid)/2).'px;margin-top: '.((500-$hei)/2).'px;"/></center>
	    						';
	    					}
	    				}
	    				echo '</li>';
	    				
	    				
	    			}

	    			echo '
	    		</ul>

	    		

	    		
	    		';

	    		if($result4fim['count(idImage)']==1) {

	    			echo'
	    			<a href="#" id="ant'.$idAmigo.'" onclick="mudar(\''.$linha['nicknameUser'].'\',\''.$idAmigo.'\')" style="display: none;" class="voltar"><img src="imagens/setaEsq.png" width="40" height="40"></a>
	    			<a href="#" id="prox'.$idAmigo.'" onclick="mudar(\''.$linha['nicknameUser'].'\',\''.$idAmigo.'\')" style="display: none;" class="ir"><img src="imagens/setaDir.png" width="40" height="40"></a>
	    			';
	    		} else if($result4fim['count(idImage)']==0) {
	    		} else {
	    			echo'
	    			<style>
							#ant'.$idAmigo.' {
	    				visibility:visible;
	    			}
							#prox'.$idAmigo.' {
	    			visibility:visible;
	    		}
	    	</style>
	    	<a href="#" id="ant'.$idAmigo.'" onclick="sub()" style="display: none;" class="voltar"><img src="imagens/setaEsq.png" width="40" height="40"></a>
	    	<a href="#" id="prox'.$idAmigo.'" style="display: none;" class="ir"><img src="imagens/setaDir.png" width="40" height="40"></a>
	    	';
	    }
	    echo'</div></div>

	</div><!--FIM DIV IMAGENS-->';


}



?>



<!-- maps for scroll images -->


<div id="scroll_maps_h">
	<map name="lftaro">

		<area alt="" coords="0,0,40,105" href="#" class="mouseover_left_100" onmouseover="opa('l')" onmouseout="opabye('l')">
	</map>
	
	<map name="rtaro">

		<area alt="" coords="0,0,40,105" href="#" class="mouseover_right_100" onmouseover="opa('r')" onmouseout="opabye('r')">
	</map>
</div>
<div class="outer">
	    <div class="middle">
<div id="logo"></div>
</div></div>
</body>
</html>

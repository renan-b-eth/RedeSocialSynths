
<!DOCTYPE html>
<html>
<head>
	<title>Demo - jQuery Smooth Div Scroll - Thomas Kahn</title>
	
	<!-- the CSS for Smooth Div Scroll -->
	<link rel="Stylesheet" type="text/css" href="css/smoothDivScroll.css" />
	
	<!-- Styles for my specific scrolling content -->
	<style type="text/css">
*{margin:0;padding:0}
		

	#hold {
	position: relative;
	width: 100%;
	height: 105px;
	background-color: orange;
	overflow: hidden;
	white-space: nowrap;
	overflow-x: scroll;

}
.historia {

    background: black;
    cursor: pointer;
    display: inline-block;
    width: 80px;
    height: 80px;

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
	</style>


</head>

<body>
<div id="hold">
		<a href="#" onclick="alert(\'cc\')"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">acs</div></div></a>
		<a href="#" onclick="resettabs(\'megan\',\'20\')"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">Megan</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">bb</div></div></a>
		<a href="#" ><div class="historia" onclick="alert("cc")"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">aa</div></div></a>
		<a href="#" onclick="alert("cc")"><div class="historia"><div class="picHistoria" style="border-color: cyan;"><img src="imagens/icones/OutrosIcones/meganTeste.jpg" width="100%"></div><div class="nameHistoria">cc</div></div></a>
		<a href="#" onclick="resettabs("megan","20")"><div class="historia" style="opacity: 0;"><div class="picHistoria" style="border-color: cyan;"></div><div class="nameHistoria">cc</div></div></a>

	</div>
	            		


</body>
</html>
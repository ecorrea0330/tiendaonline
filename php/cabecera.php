
<?php
 session_start();
if(!isset($_SESSION['contador'])){$_SESSION['contador'] =0;}
 ?>

<!doctype html>
<html lang = "es">
	<head>
		<title>Literatura</title>
		<!--//estas son las medidas para mostra en pantallas web... apartir de 1 a 800-->
		<link rel = Stylesheet href = "css/pcmac.css" media = 'screen and (min-width: 801px) and (max-width: 4000px)'>
		<meta http-equiv = "Content-Type" content = "text/html; charset = UTF-8">
		<script type="text/javascript" src= "js/jquery.js"></script>
		<script type="text/javascript" src= "js/codigo.js"></script>
	</head>
	<body>
		
		<div id = "contenedor">
			<header>
				<div id="logo">
				<a href="index.php"><h1>literario</h1></a>
				</div>
			</header>
			<section>
			<div id="contienecarrito">	
			<div id="carrito">
					Carrito
				</div>

				<div id="botones">

				<a href='php/destruir.php'><button>Vaciar Carrito</button></a>
				<a href='confirmar.php'><button>Confirmar Compra</button></a>

			</div>
				</div>
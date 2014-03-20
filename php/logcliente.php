<?php


include "cabecera.php";

	
	$contador = 0;
	//En este pedazo estoy accediendo a la base de datos, tiendaonline.
	$conexion = mysqli_connect("localhost", "eco", "web", "tiendaonline");
	mysqli_set_charset($conexion, "utf8");
	//Le pido que me acceda a la tabla productos.  
	$peticion = "SELECT * FROM clientes WHERE usuario = '".$_POST['usuario']."' AND contrasena = '".$_POST['contrasena']."' ";
	$resultado = mysqli_query($conexion, $peticion);

	while($fila = mysqli_fetch_array($resultado)){
    $contador++;
    $_SESSION['usuario'] = $fila['id'];
	}
	if($contador > 0){

// para guardar el pedido en la base de datos . Donde uno es estado 0 pedido no entregado y 1 pedido entegado. 
	$peticion = "INSERT INTO pedidos VALUES (NULL,".$_SESSION['usuario'].", '".date('U')."','0')";
	$resultado = mysqli_query($conexion, $peticion);

	$peticion = "SELECT * FROM pedidos WHERE idcliente = '".$_SESSION['usuario']."' ORDER BY fecha DESC LIMIT 1";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
    $_SESSION['idpedido'] = $fila['id'];
	}
	echo $_SESSION['idpedido'];

	for($i = 0; $i< $_SESSION['contador']; $i++){
		$peticion = "INSERT INTO lineaspedido VALUES (NULL,'".$_SESSION['idpedido']."', '".$_SESSION['producto'] [$i]."', '1' ) ";
		$resultado = mysqli_query($conexion, $peticion);

		//resto los productos q compro para el tock
		$peticion = "SELECT * FROM productos WHERE id='".$_SESSION['producto'][$i]."'";
		$resultado = mysqli_query($conexion, $peticion);
		while($fila = mysqli_fetch_array($resultado)){
		    $stock = $fila['stock'];
			$peticiondos = "UPDATE productos SET stock ='".($stock-1)."' WHERE id='".$_SESSION['producto'] [$i]."'";
			$resultadodos = mysqli_query($conexion, $peticiondos);
			}


	}

		

		echo "<br>Tu pedido se ha realizado satisfactoriamente. Redirigiendo a la pagina principal en 5 segundos  ";
		session_destroy();
		echo ' <meta http-equiv="refresh" content="5; url=../index.php">';

		include "piedepagina.php";



	}else {
		echo "<br>El usuario no existe. Volviendo a la tienda en 5 segundos";
		echo ' <meta http-equiv="refresh" content="5; url=../confirmar.php">';

	}
	mysqli_close($conexion);
	include "piedepagina.php";
?>
<?php

	//En este pedazo estoy accediendo a la base de datos, tiendaonline.
	$conexion = mysqli_connect("localhost", "eco", "web", "tiendaonline");
	mysqli_set_charset($conexion, "utf8");
	//Le pido que me acceda a la tabla productos.  

	$peticion = "UPDATE pedidos SET estado=1 WHERE id ='".$_GET['id']."'";
	$resultado = mysqli_query($conexion, $peticion);
	mysqli_close($conexion);
?>
<script >
window.location = "../admin/pedidos.php";
</script>
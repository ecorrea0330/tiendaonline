<?php 

session_start();
$suma =0;

if (isset($_GET['p'])) {

$_SESSION['producto'] [$_SESSION['contador']] = $_GET['p'];
$_SESSION['contador'] ++;

}


	//En este pedazo estoy accediendo a la base de datos, tiendaonline.
	$conexion = mysqli_connect("localhost", "eco", "web", "tiendaonline");
	mysqli_set_charset($conexion, "utf8");
	//Le pido que me acceda a la tabla productos.  

	
	
echo "<table>";
for($i = 0; $i< $_SESSION['contador']; $i++){
	//echo "Producto: ".$_SESSION['producto'] [$i]."<br>";
	$peticion = "SELECT * FROM productos WHERE id=".$_SESSION['producto'] [$i]." ";
	$resultado = mysqli_query($conexion, $peticion);

	while($fila = mysqli_fetch_array($resultado)){	

	echo "<tr><td>".$fila['nombre']."</td><td>".$fila['precio']."</td></tr>";
	
	$suma += $fila['precio'];

	}
}

echo "<tr><td>Subtotal</td><td>".number_format($suma)."</td><tr>";
echo "</table>";
mysqli_close($conexion);
?>
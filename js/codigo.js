$(document).ready(inicio)
function inicio(){

$(".botoncompra").click(anade)
$("#carrito").load("php/poncarrito.php");
}
function anade(){
     //reconoce el id cuando se hace click en el boton comprar ahora. para que lo meta en el carrito.
	$("#carrito").load("php/poncarrito.php?p="+$(this).val());
}
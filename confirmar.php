<?php include "php/cabecera.php" ?>
<br>
¿Ya eres usuario ? <br>


<form action ="php/logcliente.php" method="POST">
<input type="text" name="usuario" placeholder="Introduce tu nombre de usuario">
<input type="text" name="contrasena" placeholder="Introduce tu contrasena">
<input type="submit">

</form>

¿Eres nuevo Usuario?<br>

<?php include "php/piedepagina.php" ?>
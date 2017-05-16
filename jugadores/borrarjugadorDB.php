<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Borrar jugador</title>
  </head>
  <body>
    <?php
      include 'jugador.php';
      $jugador=new Jugador();
      $borrar=$jugador->Borrarjugador($_GET["codigo"]);
      if ($borrar==true) {
       ?>
       <em>Borrado realizado con exito</em>
        <a href="index.php">Index</a>
        <a href="listajugadores.php">Borrar otro registro</a>
       <?php
      }else {
        ?>
        <a href="listajugadores.php">Error en el borrado</a>
        <?php
      }
     ?>
  </body>
</html>

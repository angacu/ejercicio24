<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar insertado</title>
  </head>
  <body>
    <?php
    if (empty($_POST['codigo'])==false AND empty($_POST['nombre'])==false AND empty($_POST['procedencia'])==false AND empty($_POST['altura'])==false AND empty($_POST['peso'])==false AND empty($_POST['posicion'])==false AND empty($_POST['equipo'])==false) {
      // incluimos consultas y conexion a la bdd
      include 'jugador.php';
      $jugador=new Jugador();
      // actualizar jugador
      $actualizarjugador=$jugador->ActualizarJugador($_POST["codigo"],  $_POST["nombre"], $_POST["procedencia"], $_POST["altura"], $_POST["peso"], $_POST["posicion"], $_POST["equipo"]);
      // devolver jugActualizadoo
      if ($actualizarjugador==true) {
        $tablajugador=$jugador->DevolverJugadorCodigo($_POST["codigo"]);
        foreach ($tablajugador as $fila) {
          echo "Codigo: ".$fila['codigo'];
            echo "<br>";
          echo "Nombre: ".$fila['Nombre'];
            echo "<br>";
          echo "Procedencia: ".$fila['Procedencia'];
            echo "<br>";
          echo "Altura: ".$fila['Altura'];
            echo "<br>";
          echo "Peso: ".$fila['Peso'];
            echo "<br>";
          echo "Posicion: ".$fila['Posicion'];
            echo "<br>";
          echo "Equipo: ".$fila['Nombre_equipo'];
        }
        // actualizar ultimo insert (datos)
          echo "<br>";
          echo "<a href='actualizarjugador.php?codigo=".$fila["codigo"]."&nombre=".$fila["Nombre"]."&procedencia=".$fila["Procedencia"]."&altura=".$fila["Altura"]."&peso=".$fila["Peso"]."&posicion=".$fila["Posicion"]."&equipo=".$fila["Nombre_equipo"]."'>Actualizar registro.</a>";
          echo "<br>";
          echo "<a href='listajugadores.php'>Borrar registro.</a>";
    }else {
          echo "Error en la actualizacion";
    }
     ?>
  </body>
</html>

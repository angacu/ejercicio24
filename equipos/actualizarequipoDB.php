<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar</title>
  </head>
  <body>
    <?php
      if (empty($_POST["nombre"])==false && empty($_POST["ciudad"])==false && empty($_POST["conferencia"])==false && empty($_POST["division"])==false) {
        // incluimos base de datos
        include 'equipo.php';
        $equipo=new Equipo();
        // ActualizarEquipo
        $actualizarequipo=$equipo->ActualizarEquipo($_POST["nombre"], $_POST["ciudad"], $_POST["conferencia"], $_POST["division"]);

        // dvolver usuario actualizado
        if ($actualizarequipo==true) {
          $tablaequipo=$equipo->DevolverEquipoNombre($_POST["nombre"]);
          foreach ($tablaequipo as $fila) {
            echo "Nombre: ".$fila["Nombre"]."<br>";
            echo "Ciudad: ".$fila["Ciudad"]."<br>";
            echo "Conferencia: ".$fila["Conferencia"]."<br>";
            echo "Division: ".$fila["Division"]."<br>";
          }
            // actualizar
            echo "<br>";
            echo "<a href='actualizarequipo.php?nombre=".$fila["Nombre"]."&ciudad=".$fila["Ciudad"]."&conferencia=".$fila["Conferencia"]."&division=".$fila["Division"]."'>Actualizar registro.</a>";
            echo "<br>";
            echo "<a href='listaequipos.php'>Borrar registro.</a>";
        }else {
          echo "Error en la actualizacion";
        }
      }
     ?>
  </body>
</html>

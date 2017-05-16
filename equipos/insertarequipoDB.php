<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insertar nuevo equipo</title>
  </head>
  <body>
    <?php
    // comprobacion para ver que los campos no estan vacios, en el caso de estarlo dara error.
    if (empty($_POST["nombre"])==false && empty($_POST["ciudad"])==false && empty($_POST["conferencia"])==false && empty($_POST["division"])==false) {
    // incluir ddbb y el objeto de conexion
      include 'equipo.php';
      $equipo=new Equipo();
    // llamamos a la funcion que inserta
      $resultado=$equipo->Insertarequipo($_POST["nombre"],  $_POST["ciudad"], $_POST["conferencia"], $_POST["division"]);
    // ultimo equipo filtrado por nombre
        echo "ULTIMO REGISTRO: <br>";
      $tablaequipo=$equipo->DevolverEquipoNombre($_POST["nombre"]);
      foreach ($tablaequipo as $fila) {
        echo "Nombre: " .$fila["Nombre"] ."<br>Ciudad: " .$fila["Ciudad"] ."<br>Conferencia: " .$fila["Conferencia"] ."<br>Division: " .$fila["Division"];
      }
    // actualizar UltimoEquipo insertado
        echo "<br>";
        echo "<a href='actualizarequipo.php?nombre=".$fila["Nombre"]."&ciudad=".$fila["Ciudad"]."&conferencia=".$fila["Conferencia"]."&division=".$fila["Division"]."'>Actualizar registro.</a>";
        echo "<br>";
        echo "<a href='listaequipos.php'>Borrar registro.</a>";
    }else {
        echo "<a href='insertarequipo.php'> Debes rellenar todos los campos </a>";
    }
     ?>
  </body>
</html>

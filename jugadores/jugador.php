<?php
include 'db.php';
class Jugador extends db
{
  function __construct()
  {
  // conexion a la base de datos.
    parent::__construct();
  }
  // funcion insertar
  public function Insertarjugador($codigo, $nombre, $procedencia, $altura, $peso, $posicion, $equipo)
  {
    $sql="INSERT INTO jugadores(codigo, Nombre, Procedencia, Altura, Peso, Posicion, Nombre_equipo) VALUES (".$codigo.", '".$nombre ."', '" .$procedencia ."', '" .$altura ."', ".$peso .", '".$posicion."', '".$equipo ."')";
    $insertjugador=$this->realizarInsert($sql);
    if ($insertjugador=!false) {
      return true;
    }else {
      return false;
    }
  }
  // funcion devolver
  public function DevolverJugadorCodigo($codigo)
  {
    $sql="SELECT * FROM jugadores WHERE codigo=" .$codigo;
    $devolverJugador=$this->realizarConsulta($sql);
        if($devolverJugador!=null){
  // tabla de resultados
      $tablajugador=[];
      while($fila=$devolverJugador->fetch_assoc()){
        $tablajugador[]=$fila;
      }
      return $tablajugador;
    }else{
      return null;
    }
  }
  // listamos los jugadores
  public function ListaJugadores()
  {
    $sql="SELECT * FROM jugadores";
    $listajugadores=$this->realizarConsulta($sql);
    if ($listajugadores!=null) {
      $tablalista=[];
      while ($fila=$listajugadores->fetch_assoc()) {
        $tablalista[]=$fila;
      }
      return $tablalista;
    }else {
      return null;
    }
  }
  // actualizar equipo en la BD
  public function ActualizarJugador($codigo, $nombre, $procedencia, $altura, $peso, $posicion, $equipo)
  {
    $sql="UPDATE jugadores SET codigo=" .$codigo .", Nombre='" .$nombre ."', Procedencia='" .$procedencia ."', Altura='" .$altura ."', Peso=" .$peso .", Posicion='" .$posicion ."', Nombre_equipo='" .$equipo ."' WHERE codigo=" .$codigo;
    $actualizarjugador=$this->realizarActualizacion($sql);
    if ($actualizarjugador=!false) {
      return true;
    }else {
      return false;
    }
  }
  // funcion para borrar
  public function Borrarjugador($codigo)
  {
    $sql="DELETE FROM jugadores WHERE codigo=".$codigo;
    $borrarjugador=$this->realizarBorrado($sql);
    if ($borrarjugador=!false) {
      return true;
    }else {
      return false;
    }
  }
}
 ?>

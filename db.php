<?php
class db
{
  // atributos para la conexion
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";
  // objeto de conexion
  private $conexion;
  // control de errores
  private $error=false;
  private $error_msj="";
  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
        $this->error_msj="No se ha podido realizar la conexion a la bd";
      }
  }
  // hay error en la conexion????
  function hayError(){
    return $this->error;
  }
  // mensaje de error
  function msjError(){
    return $this->error_msj;
  }
  // funcion para realizar consultas sobre la bdd
  public function realizarConsulta($consulta){
    if($this->error==false){
      $resultado = $this->conexion->query($consulta);
      return $resultado;
    }else{
      $this->error_msj="Error al realizar la consulta: ".$consulta;
      return null;
    }
  }
  // funcion para insertar en la bbdd
  public function realizarInsert($insert){
    if($this->error==false){
      if (!$this->conexion->query($insert)) {
        echo "Error en la insercion en la tabla: (" . $this->conexion->errno .")" . $this->conexion->error;
        return false;
      }else {
        return true;
      }
    }else{
      $this->error_msj="Error al realizar la insercion: ".$insert;
      return false;
    }
  }
  // fucnion para actualizar la bdd
  public function realizarActualizacion($update)
  {
    if($this->error==false){
      if (!$this->conexion->query($update)) {
        echo "Error en la actualizacion de la tabla: (" . $this->conexion->errno .")" . $this->conexion->error;
        return false;
      }else {
        return true;
      }
    }else{
      $this->error_msj="Imposible realizar la actualizacion: ".$update;
      return false;
    }
  }
// funcion para borrar
  public function realizarBorrado($delete)
  {
    if($this->error==false){
      if (!$this->conexion->query($delete)) {
        echo "Falló el borrado de la tabla: (" . $this->conexion->errno .")" . $this->conexion->error;
        return false;
      }else {
        return true;
      }
    }else{
      $this->error_msj="Imposible realizar el borrado: ".$update;
      return false;
    }
  }
}
 ?>

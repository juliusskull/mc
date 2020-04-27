<?php
        class Clientes
        {
          private $db;
public  $id;
public  $nombre;
public  $apellido;
public  $fecha_nac;
public  $peso;
public  $telefono1;
public  $dni;
public  $sexo;
public  $direccion;
public  $ciudad;
public  $fch_alta;
public  $id_usu_alta;
public  $estado;
public  $usuarioid;
 public function __CONSTRUCT()
          {
            try
            {
              $this->id=0;
              $this->db = Database::Conectar();
            }
            catch(Exception $e)
            {
              die($e->getMessage());
            }
          }
public function delete($campo, $valor)
  {
    try
    {
      $stm = $this->db
                  ->prepare("DELETE FROM clientes WHERE $campo = ?");

      $stm->execute(array($valor));
    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
  public function isExiste($valor)
  {
    try
    {
      $stm = $this->db
                ->prepare("select * from clientes where id =  ?");

      $stm->execute(array($valor));
		if ( $stm->rowCount()>0){
			return true;
		}else{
			return false;
		}
    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
public function insert($data)
  {
    try
    {
    $sql = "INSERT INTO clientes (id,nombre,apellido,fecha_nac,peso,telefono1,dni,sexo,direccion,ciudad,fch_alta,id_usu_alta,estado,usuarioid)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->id,$data->nombre,$data->apellido,$data->fecha_nac,$data->peso,$data->telefono1,$data->dni,$data->sexo,$data->direccion,$data->ciudad,$data->fch_alta,$data->id_usu_alta,$data->estado,$data->usuarioid
              )
      );
    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
            public function get_new_date_db($dateString){
                echo "dateString=$dateString</p>";
                return date_format(date_create_from_format('d/m/Y H:i', $dateString), 'Y-m-d H:i');


            }
 public function update($data)
  {
    try
    {
      $sql = "UPDATE clientes SET
            nombre=?,apellido=?,fecha_nac=?,peso=?,telefono1=?,dni=?,sexo=?,direccion=?,ciudad=?,fch_alta=?,id_usu_alta=?,estado=?,usuarioid=?
            WHERE id = ".$this->id;
      $v=  array(
          $data->nombre,$data->apellido,$data->fecha_nac,$data->peso,$data->telefono1,$data->dni,$data->sexo,$data->direccion,$data->ciudad,$data->fch_alta,$data->id_usu_alta,$data->estado,$data->usuarioid
      );

      $this->db->prepare($sql)
           ->execute(
            $v
          );
    } catch (Exception $e)
    {
     echo   "E=". $e->getMessage()."</>";
      die($e->getMessage());
    }
  }
public function commit(){
    if($this->id>0){
        $this->update($this);
    }else{
        $this->insert($this);
    }

    }
 public function ini($id)
  {
    try
    {
    $sql = "SELECT id,nombre,apellido,fecha_nac,peso,telefono1,dni,sexo,direccion,ciudad,fch_alta,id_usu_alta,estado,usuarioid FROM clientes where id=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->id=$value->id;
        $this->nombre=$value->nombre;
        $this->apellido=$value->apellido;
        $this->fecha_nac=$value->fecha_nac;
        $this->peso=$value->peso;
        $this->telefono1=$value->telefono1;
        $this->dni=$value->dni;
        $this->sexo=$value->sexo;
        $this->direccion=$value->direccion;
        $this->ciudad=$value->ciudad;
        $this->fch_alta=$value->fch_alta;
        $this->id_usu_alta=$value->id_usu_alta;
        $this->estado=$value->estado;
        $this->usuarioid=$value->usuarioid;
     }

    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
 public function getAll($w=null)
  {
    $where="";
    if(isset($w)){
        $where=" where ".$w;
    }
    try
    {
    $sql = "SELECT id,nombre,apellido,DATE_FORMAT(fecha_nac, '%d/%m/%Y %H:%i') as fecha_nac,peso,telefono1,dni,sexo,direccion,ciudad,fch_alta,id_usu_alta,estado,usuarioid
     , TIMESTAMPDIFF(YEAR,fecha_nac,CURDATE()) edad
     FROM clientes".$where;
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

    $resultado = $gsent->fetchALL(PDO::FETCH_ASSOC);
    $rows = array();

    foreach($resultado as $value){

        $rows[] = $value;
    }

    return $rows;

    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
 public function getAll_json()
  {
        echo json_encode($this->getAll());
  }
 public function getOne($id)
  {
    try
    {
    $sql = "SELECT id,nombre,apellido,DATE_FORMAT(fecha_nac, '%d/%m/%Y') as fecha_nac,peso,telefono1,dni,sexo,direccion,ciudad,fch_alta,id_usu_alta,estado,usuarioid
    , TIMESTAMPDIFF(YEAR,fecha_nac,CURDATE()) edad
    FROM clientes where id=?";
    $gsent = $this->db->prepare($sql);
    $gsent->execute(array($id));

    $gsent->execute();

    $resultado = $gsent->fetchALL(PDO::FETCH_ASSOC);
    $rows = array();

    foreach($resultado as $value){

        $rows[] = $value;
    }

    return $rows;

    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
} ?>

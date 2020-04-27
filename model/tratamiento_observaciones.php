<?php
        class Tratamiento_observaciones
        {
          private $db;
public  $id;
public  $id_tratamiento;
public  $fecha_alta;
public  $id_tipo_tratamiento;
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
                  ->prepare("DELETE FROM tratamiento_observaciones WHERE $campo = ?");

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
                ->prepare("select * from tratamiento_observaciones where id =  ?");

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
    $sql = "INSERT INTO tratamiento_observaciones (id,id_tratamiento,fecha_alta,id_tipo_tratamiento,usuarioid)
            VALUES (?,?,?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->id,$data->id_tratamiento,$data->fecha_alta,$data->id_tipo_tratamiento,$data->usuarioid
              )
      );
    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
 public function update($data)
  {
    try
    {
      $sql = "UPDATE tratamiento_observaciones SET
            id_tratamiento=?,fecha_alta=?,id_tipo_tratamiento=?,usuarioid=?
            WHERE id = ".$this->id;

      $this->db->prepare($sql)
           ->execute(
            array(
					$data->id_tratamiento,$data->fecha_alta,$data->id_tipo_tratamiento,$data->usuarioid
                  )
          );
    } catch (Exception $e)
    {
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
    $sql = "SELECT id,id_tratamiento,fecha_alta,id_tipo_tratamiento,usuarioid FROM tratamiento_observaciones where id=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->id=$value->id;
$this->id_tratamiento=$value->id_tratamiento;
$this->fecha_alta=$value->fecha_alta;
$this->id_tipo_tratamiento=$value->id_tipo_tratamiento;
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
    $sql = "SELECT id,id_tratamiento,fecha_alta,id_tipo_tratamiento,usuarioid FROM tratamiento_observaciones".$where;
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
    $sql = "SELECT id,id_tratamiento,fecha_alta,id_tipo_tratamiento,usuarioid FROM tratamiento_observaciones where id=?";
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

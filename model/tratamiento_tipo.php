<?php
        class Tratamiento_tipo
        {
          private $db;
public  $id;
public  $nombre;
public  $fecha_alta;
public  $id_usu_alta;
public  $id_usu_cad;
public  $fch_cad;
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
                  ->prepare("DELETE FROM tratamiento_tipo WHERE $campo = ?");

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
                ->prepare("select * from tratamiento_tipo where id =  ?");

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
    $sql = "INSERT INTO tratamiento_tipo (id,nombre,fecha_alta,id_usu_alta,id_usu_cad,fch_cad,usuarioid)
            VALUES (?,?,?,?,?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->id,$data->nombre,$data->fecha_alta,$data->id_usu_alta,$data->id_usu_cad,$data->fch_cad,$data->usuarioid
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
      $sql = "UPDATE tratamiento_tipo SET
            nombre=?,fecha_alta=?,id_usu_alta=?,id_usu_cad=?,fch_cad=?,usuarioid=?
            WHERE id = ".$this->id;

      $this->db->prepare($sql)
           ->execute(
            array(
					$data->nombre,$data->fecha_alta,$data->id_usu_alta,$data->id_usu_cad,$data->fch_cad,$data->usuarioid
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
    $sql = "SELECT id,nombre,fecha_alta,id_usu_alta,id_usu_cad,fch_cad,usuarioid FROM tratamiento_tipo where id=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->id=$value->id;
$this->nombre=$value->nombre;
$this->fecha_alta=$value->fecha_alta;
$this->id_usu_alta=$value->id_usu_alta;
$this->id_usu_cad=$value->id_usu_cad;
$this->fch_cad=$value->fch_cad;
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
    $sql = "SELECT id,nombre,fecha_alta,id_usu_alta,id_usu_cad,fch_cad,usuarioid FROM tratamiento_tipo".$where;
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
    $sql = "SELECT id,nombre,fecha_alta,id_usu_alta,id_usu_cad,fch_cad,usuarioid FROM tratamiento_tipo where id=?";
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

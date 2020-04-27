<?php
        class Tratamiento
        {
          private $db;
public  $id;
public  $id_cliente;
public  $id_tipo_tratamiento;
public  $fch_ini;
public  $fch_fin;
public  $fch_alta;
public  $id_usu_alta;
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
                  ->prepare("DELETE FROM tratamiento WHERE $campo = ?");

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
                ->prepare("select * from tratamiento where id =  ?");

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
    $sql = "INSERT INTO tratamiento (id,id_cliente,id_tipo_tratamiento,fch_ini,fch_fin,fch_alta,id_usu_alta,fch_cad,usuarioid)
            VALUES (?,?,?,?,?,?,?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->id,$data->id_cliente,$data->id_tipo_tratamiento,$data->fch_ini,$data->fch_fin,$data->fch_alta,$data->id_usu_alta,$data->fch_cad,$data->usuarioid
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
      $sql = "UPDATE tratamiento SET
            id_cliente=?,id_tipo_tratamiento=?,fch_ini=?,fch_fin=?,fch_alta=?,id_usu_alta=?,fch_cad=?,usuarioid=?
            WHERE id = ".$this->id;

      $this->db->prepare($sql)
           ->execute(
            array(
					$data->id_cliente,$data->id_tipo_tratamiento,$data->fch_ini,$data->fch_fin,$data->fch_alta,$data->id_usu_alta,$data->fch_cad,$data->usuarioid
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
    $sql = "SELECT id,id_cliente,id_tipo_tratamiento,fch_ini,fch_fin,fch_alta,id_usu_alta,fch_cad,usuarioid FROM tratamiento where id=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->id=$value->id;
$this->id_cliente=$value->id_cliente;
$this->id_tipo_tratamiento=$value->id_tipo_tratamiento;
$this->fch_ini=$value->fch_ini;
$this->fch_fin=$value->fch_fin;
$this->fch_alta=$value->fch_alta;
$this->id_usu_alta=$value->id_usu_alta;
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
    $sql = "SELECT id,id_cliente,id_tipo_tratamiento,fch_ini,fch_fin,fch_alta,id_usu_alta,fch_cad,usuarioid FROM tratamiento".$where;
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
    $sql = "SELECT id,id_cliente,id_tipo_tratamiento,fch_ini,fch_fin,fch_alta,id_usu_alta,fch_cad,usuarioid FROM tratamiento where id=?";
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

<?php
        class Fotos
        {
          private $db;
public  $id;
public  $id_cliente;
public  $archivo;
public  $tipo;
public  $size;
public  $foto_desc;
public  $foto_observacion;
public  $fch_alta;
public  $id_usu_alta;
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
                  ->prepare("DELETE FROM fotos WHERE $campo = ?");

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
                ->prepare("select * from fotos where id =  ?");

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
    $sql = "INSERT INTO fotos (id,id_cliente,archivo,tipo,size,foto_desc,foto_observacion,fch_alta,id_usu_alta,usuarioid)
            VALUES (?,?,?,?,?,?,?,?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->id,$data->id_cliente,$data->archivo,$data->tipo,$data->size,$data->foto_desc,$data->foto_observacion,$data->fch_alta,$data->id_usu_alta,$data->usuarioid
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
      $sql = "UPDATE fotos SET
            id_cliente=?,archivo=?,tipo=?,size=?,foto_desc=?,foto_observacion=?,fch_alta=?,id_usu_alta=?,usuarioid=?
            WHERE id = ".$this->id;

      $this->db->prepare($sql)
           ->execute(
            array(
					$data->id_cliente,$data->archivo,$data->tipo,$data->size,$data->foto_desc,$data->foto_observacion,$data->fch_alta,$data->id_usu_alta,$data->usuarioid
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
    $sql = "SELECT id,id_cliente,archivo,tipo,size,foto_desc,foto_observacion,fch_alta,id_usu_alta,usuarioid FROM fotos where id=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->id=$value->id;
$this->id_cliente=$value->id_cliente;
$this->archivo=$value->archivo;
$this->tipo=$value->tipo;
$this->size=$value->size;
$this->foto_desc=$value->foto_desc;
$this->foto_observacion=$value->foto_observacion;
$this->fch_alta=$value->fch_alta;
$this->id_usu_alta=$value->id_usu_alta;
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
    $sql = "SELECT id,id_cliente,archivo,tipo,size,foto_desc,foto_observacion,fch_alta,id_usu_alta,usuarioid FROM fotos".$where;
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
    $sql = "SELECT id,id_cliente,archivo,tipo,size,foto_desc,foto_observacion,fch_alta,id_usu_alta,usuarioid FROM fotos where id=?";
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

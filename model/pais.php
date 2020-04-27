<?php
        class Pais
        {
          private $db;
public  $id;
public  $descripcion;
public  $fchalta;
public  $activo;
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
                  ->prepare("DELETE FROM pais WHERE $campo = ?");

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
                ->prepare("select * from pais where id =  ?");

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
    $sql = "INSERT INTO pais (id,descripcion,fchalta,activo,usuarioid)
            VALUES (?,?,?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->id,$data->descripcion,$data->fchalta,$data->activo,$data->usuarioid
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
      $sql = "UPDATE pais SET
            descripcion=?,fchalta=?,activo=?,usuarioid=?
            WHERE id = ".$this->id;

      $this->db->prepare($sql)
           ->execute(
            array(
					$data->descripcion,$data->fchalta,$data->activo,$data->usuarioid
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
    $sql = "SELECT id,descripcion,fchalta,activo,usuarioid FROM pais where id=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->id=$value->id;
$this->descripcion=$value->descripcion;
$this->fchalta=$value->fchalta;
$this->activo=$value->activo;
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
    $sql = "SELECT id,descripcion,fchalta,activo,usuarioid FROM pais".$where;
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
    $sql = "SELECT id,descripcion,fchalta,activo,usuarioid FROM pais where id=?";
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

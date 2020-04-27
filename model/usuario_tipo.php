<?php
        class Usuario_tipo
        {
          private $db;
public  $id_tipo_usuario;
public  $desc_tipo;
public  $observacion;
 public function __CONSTRUCT()
          {
            try
            {
              $this->id_tipo_usuario=0;
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
                  ->prepare("DELETE FROM usuario_tipo WHERE $campo = ?");

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
                ->prepare("select * from usuario_tipo where id_tipo_usuario =  ?");

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
    $sql = "INSERT INTO usuario_tipo (id_tipo_usuario,desc_tipo,observacion)
            VALUES (?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->id_tipo_usuario,$data->desc_tipo,$data->observacion
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
      $sql = "UPDATE usuario_tipo SET
            desc_tipo=?,observacion=?
            WHERE id_tipo_usuario = ".$this->id_tipo_usuario;

      $this->db->prepare($sql)
           ->execute(
            array(
					$data->desc_tipo,$data->observacion
                  )
          );
    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
public function commit(){
    if($this->id_tipo_usuario>0){
        $this->update($this);
    }else{
        $this->insert($this);
    }

    }
 public function ini($id)
  {
    try
    {
    $sql = "SELECT id_tipo_usuario,desc_tipo,observacion FROM usuario_tipo where id_tipo_usuario=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->id_tipo_usuario=$value->id_tipo_usuario;
$this->desc_tipo=$value->desc_tipo;
$this->observacion=$value->observacion;
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
    $sql = "SELECT id_tipo_usuario,desc_tipo,observacion FROM usuario_tipo".$where;
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
    $sql = "SELECT id_tipo_usuario,desc_tipo,observacion FROM usuario_tipo where id_tipo_usuario=?";
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

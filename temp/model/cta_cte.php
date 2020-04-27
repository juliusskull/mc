<?php
        class Cta_cte
        {
          private $db;
public  $id;
public  $id_cliente;
public  $monto;
public  $presupuesto;
public  $fch_alta;
public  $id_usu_alta;
public  $fch_cad;
public  $id_usu_cad;
public  $fch_inicio;
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
                  ->prepare("DELETE FROM cta_cte WHERE $campo = ?");

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
                ->prepare("select * from cta_cte where id =  ?");

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
    $sql = "INSERT INTO cta_cte (id,id_cliente,monto,presupuesto,fch_alta,id_usu_alta,fch_cad,id_usu_cad,fch_inicio,usuarioid)
            VALUES (?,?,?,?,?,?,?,?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->id,$data->id_cliente,$data->monto,$data->presupuesto,$data->fch_alta,$data->id_usu_alta,$data->fch_cad,$data->id_usu_cad,$data->fch_inicio,$data->usuarioid
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
      $sql = "UPDATE cta_cte SET
            id_cliente=?,monto=?,presupuesto=?,fch_alta=?,id_usu_alta=?,fch_cad=?,id_usu_cad=?,fch_inicio=?,usuarioid=?
            WHERE id = ".$this->id;

      $this->db->prepare($sql)
           ->execute(
            array(
					$data->id_cliente,$data->monto,$data->presupuesto,$data->fch_alta,$data->id_usu_alta,$data->fch_cad,$data->id_usu_cad,$data->fch_inicio,$data->usuarioid
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
    $sql = "SELECT id,id_cliente,monto,presupuesto,fch_alta,id_usu_alta,fch_cad,id_usu_cad,fch_inicio,usuarioid FROM cta_cte where id=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->id=$value->id;
$this->id_cliente=$value->id_cliente;
$this->monto=$value->monto;
$this->presupuesto=$value->presupuesto;
$this->fch_alta=$value->fch_alta;
$this->id_usu_alta=$value->id_usu_alta;
$this->fch_cad=$value->fch_cad;
$this->id_usu_cad=$value->id_usu_cad;
$this->fch_inicio=$value->fch_inicio;
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
    $sql = "SELECT id,id_cliente,monto,presupuesto,fch_alta,id_usu_alta,fch_cad,id_usu_cad,fch_inicio,usuarioid FROM cta_cte".$where;
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
    $sql = "SELECT id,id_cliente,monto,presupuesto,fch_alta,id_usu_alta,fch_cad,id_usu_cad,fch_inicio,usuarioid FROM cta_cte where id=?";
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

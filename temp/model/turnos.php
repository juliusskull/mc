<?php
        class Turnos
        {
          private $db;
public  $id;
public  $id_cliente;
public  $id_usu;
public  $fch_turno;
public  $turno_desc;
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
                  ->prepare("DELETE FROM turnos WHERE $campo = ?");

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
                ->prepare("select * from turnos where id =  ?");

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
    $sql = "INSERT INTO turnos (id,id_cliente,id_usu,fch_turno,turno_desc,fch_alta,id_usu_alta,usuarioid)
            VALUES (?,?,?,?,?,?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->id,$data->id_cliente,$data->id_usu,$data->fch_turno,$data->turno_desc,$data->fch_alta,$data->id_usu_alta,$data->usuarioid
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
      $sql = "UPDATE turnos SET
            id_cliente=?,id_usu=?,fch_turno=?,turno_desc=?,fch_alta=?,id_usu_alta=?,usuarioid=?
            WHERE id = ".$this->id;

      $this->db->prepare($sql)
           ->execute(
            array(
					$data->id_cliente,$data->id_usu,$data->fch_turno,$data->turno_desc,$data->fch_alta,$data->id_usu_alta,$data->usuarioid
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
    $sql = "SELECT id,id_cliente,id_usu,fch_turno,turno_desc,fch_alta,id_usu_alta,usuarioid FROM turnos where id=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->id=$value->id;
$this->id_cliente=$value->id_cliente;
$this->id_usu=$value->id_usu;
$this->fch_turno=$value->fch_turno;
$this->turno_desc=$value->turno_desc;
$this->fch_alta=$value->fch_alta;
$this->id_usu_alta=$value->id_usu_alta;
$this->usuarioid=$value->usuarioid;
     }

    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
 public function get_sql(){
     return "SELECT  DATE_FORMAT(fch_turno, '%d/%m/%Y %H:%i') as fch_turno_desc,TIME_FORMAT(fch_turno, \"%H %i %s\") hora,concat(c.apellido,',',c.nombre) desc_cliente, (ELT(WEEKDAY(t.fch_turno) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA
    ,t.id,t.id_cliente,t.id_usu,t.fch_turno,t.turno_desc,t.fch_alta,t.id_usu_alta,t.usuarioid
    FROM turnos t,clientes c
    where t.id_cliente=c.id ";
 }
 public function getAll($w=null)
  {
    $where="";
    if(isset($w)){
        $where=" and ".$w;
    }
    try
    {
    $sql = "SELECT  TIME_FORMAT(fch_turno, \"%H %i %s\") hora,concat(c.apellido,',',c.nombre) desc_cliente, (ELT(WEEKDAY(t.fch_turno) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA
    ,t.id,t.id_cliente,t.id_usu,t.fch_turno,t.turno_desc,t.fch_alta,t.id_usu_alta,t.usuarioid
    FROM turnos t,clientes c
    where t.id_cliente=c.id ".$where ." order by t.fch_turno asc";
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


  public function get_new_horario_db($dateString){
        echo "dateString=$dateString</p>";
        return date_format(date_create_from_format('d/m/Y H:i', $dateString), 'Y-m-d H:i');


  }
  public function getOne($id)
  {


    try
    {
    $sql = $this->get_sql()." and t.id=?";

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

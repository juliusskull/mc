<?php
        class Usuario
        {
          private $db;
public  $usuario;
public  $password;
public  $id;
public  $mail;
public  $tipo;
public  $fchalta;
public  $IMEI;
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
                  ->prepare("DELETE FROM usuario WHERE $campo = ?");

      $stm->execute(array($valor));
    } catch (Exception $e)
    {
      die($e->getMessage());
    }
  }
            public function getPermiso(){
                return $this->tipo;
            }
            public function isExiste($us,$pas)
            {
                try
                {
                    $stm = $this->db
                        ->prepare("select tipo from usuario where usuario=? and password=?");

                    $stm->execute(array($us,$pas));
                    if ( $stm->rowCount()>0){
                        $resultado = $stm->fetchALL(PDO::FETCH_CLASS);

                        foreach($resultado as $value){
                            $this->tipo=$value->tipo;

                        }
                        return $this->tipo;
                    }else{
                        return -1;
                    }
                } catch (Exception $e)
                {
                    return -1;

                }
            }
public function insert($data)
  {
    try
    {
    $sql = "INSERT INTO usuario (usuario,password,id,mail,tipo,fchalta,IMEI)
            VALUES (?,?,?,?,?,?,?)";

    $this->db->prepare($sql)
         ->execute(
        array(
				$data->usuario,$data->password,$data->id,$data->mail,$data->tipo,$data->fchalta,$data->IMEI
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
      $sql = "UPDATE usuario SET
            usuario=?,password=?,mail=?,tipo=?,fchalta=?,IMEI=?
            WHERE id = ".$this->id;

      $this->db->prepare($sql)
           ->execute(
            array(
					$data->usuario,$data->password,$data->mail,$data->tipo,$data->fchalta,$data->IMEI
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
    $sql = "SELECT usuario,password,id,mail,tipo,fchalta,IMEI FROM usuario where id=$id";
    $gsent = $this->db->prepare($sql);
    $gsent->execute();

     $resultado = $gsent->fetchALL(PDO::FETCH_CLASS);

     foreach($resultado as $value){
        $this->usuario=$value->usuario;
$this->password=$value->password;
$this->id=$value->id;
$this->mail=$value->mail;
$this->tipo=$value->tipo;
$this->fchalta=$value->fchalta;
$this->IMEI=$value->IMEI;
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
    $sql = "SELECT usuario,password,id,mail,tipo,fchalta,IMEI FROM usuario".$where;
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
    $sql = "SELECT usuario,password,id,mail,tipo,fchalta,IMEI FROM usuario where id=?";
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

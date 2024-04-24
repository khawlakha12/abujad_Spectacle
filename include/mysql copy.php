<?php
Class Connection {
private  $server = "mysql:host=localhost;dbname=domiauqq_abujad";
private  $user = "domiauqq_abujad";
private  $pass = "AbuJad123...";
private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
protected $mysqli;

public function openConnection()
{
    try
        {
$this->mysqli = new PDO($this->server, $this->user,$this->pass,$this->options);
return $this->mysqli;
        }
    catch (PDOException $e)
        {
            echo "There is some problem in connection: " . $e->getMessage();
        }
}
public function closeConnection() {
    $this->mysqli = null;
    }
}
?>
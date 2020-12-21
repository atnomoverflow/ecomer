<?php
require_once('../Config/conf.php');
class Model{
    public static $PDO;
    public static function Init(){
	$dsn="mysql:host=".Conf::getHost();
    $dbname= Conf::getBase();
	$user= Conf::getLogin();
    $pass= Conf::getPass();    
    
	try{
		self::$PDO = new PDO($dsn,$user,$pass); 
		// set the PDO error mode to exception
		self::$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
	
    catch(PDOException $except){
		echo"Echec de la connexion: ".$except–>getMessage();
        return false;
    } 
    }}

    Model::Init();
    ?>
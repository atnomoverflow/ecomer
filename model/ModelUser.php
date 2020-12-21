<?php
require_once('model.php');

class ModelUser{
	private $data=array();
	public function __construct($pseudo=null,$name=null,$firstname=null,$pass=null,$email=null,$telNum=null,$location=null,$genre=null){

		$this->data['name']=$name;
		$this->data['firstName']=$firstname;
		$this->data['userName']=$pseudo;
		$this->data['pass']=$pass;
		$this->data['email']=$email;
		$this->data['phone']=$telNum;
		$this->data['adress']=$location;
		$this->data['gender']= $genre;
		$this->data['avatar']="../inc/imeges/avatar.jpg";
	}
	public function __get($attr) {
	if (!isset($this->data[$attr])) return "erreur";
		else return ($this->data[$attr]);}

	public function __set($attr,$value) {
		$this->data[$attr] = $value; }

	public function addUser($conn){
        
		try{
			$stm = $conn->prepare("INSERT INTO projet.Client(Pseudo,Nom,Prenom,Email, Telephone,adresse,genre,mp) VALUES (?,?,?,?,?,?,?,?)");
				$stm->execute([$_POST["username"],$_POST["lastname"],$_POST["firstname"], $_POST["email"], $_POST["phnumb"],
			"152",$_POST["gender"],$_POST["pass"]]);
   
			return true;
			}catch(PDOException $e ){
			if ($e->getCode() == 2300){
				$message=$e->getMessage();
			}
			return false;}
    }

	public static function getAllUser($conn){
			$result=$conn->query("SELECT * FROM projet.client ");
			if(!$result) {
            $erreur=$conn->errorInfo();
            echo "Lecture impossible, utilisateur", $conn->errorCode(),$erreur[2];
                    }
        else{
           	return $result->fetchAll(PDO::FETCH_CLASS, 'ModelUser');
            }
    }

    public static function getUser($conn,$user){
			$stm = $conn->prepare("SELECT Pseudo,mp FROM projet.Client where upper(Pseudo) like ?");
			$stm->execute([$user]);
			return $stm->fetchAll(PDO::FETCH_CLASS, 'ModelUser');			
			
	}

	public function checkUser($conn,$user,$pass){
        $stm = $conn->prepare("SELECT * FROM projet.Client where upper (Pseudo) like ? and mp = ?");
		$result=$stm->execute([$user,$pass]);
        if(!$result) {
            $erreur=$conn->errorInfo();
            echo "Lecture impossible, code", $conn->errorCode(),$erreur[2];
                    }
        else{
		return $stm->rowCount();
        }
			
	}
	public static function deleteUser($conn, $user){
		$stm= $conn->prepare("DELETE FROM projet.client where Pseudo = ?");
		try{
			$result=$stm->execute([$user]);
		return true;
		}
		catch(PDOException $e){
			return false;
		}

	}
	
    
}


<?php
require_once ('../model/ModelUser.php'); // chargement du modèle
require_once ('../model/Model.php');
class ControllerUser {
	
	public static function getAll() {
		//var_dump (Model::$PDO);
		$users = ModelUser::getAllUser(Model::$PDO);     //appel au modèle pour gerer la BD
		require ('../view/user/list.php');  //redirige vers la vue
	}
	public static function getByUserName() {
		$PDO = Model::$PDO;
		$Pseudo = $_GET['Pseudo'];
		$p_tab = ModelUser::getUser($PDO, $Pseudo);
		if (count($p_tab) == 0){
			$message="User Dosn't existe";
			require ('../view/user/error.php');
		}
		else{
			$p = $p_tab[0];
			require ('../view/user/detail.php');
		}
		
	}
	public static function addUser() {
		$success=false;
        if(!empty($_POST["pass"])&&!empty($_POST["confpass"])) {
            $password =$_POST["pass"];
            $cpassword =$_POST["confpass"];
            $p= new ModelUser($_POST["username"],$_POST["lastname"],$_POST["firstname"],$_POST["pass"],$_POST["email"],$_POST["phnumb"],"",$_POST["gender"]);
                
                if(!preg_match("#[0-9]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Number!";
                   
                }
                elseif(!preg_match("#[A-Z]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
                }   
                elseif(!preg_match("#[a-z]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                   
                }elseif($_POST['pass']==$_POST['confpass']){
            
                    if($p->checkUser(Model::$PDO,$_POST["username"],$_POST["pass"])>0){
                    	$passwordErr="this user name is used";
                    }
                   	else{
                        $p->addUser(Model::$PDO);
                        $passwordErr="congratilation your account has been created !!!";
                        $success=true;
                    }
            }else{
                $passwordErr="password does not match !!!";
          
        }
        }
        else if(empty($_POST["pass"])||empty($_POST['confpass'])) {
            $passwordErr = "Please Check You've Entered Or Confirmed Your Password!";
            
        } else {
                $passwordErr = "Please enter password";
          
        }

        require ('../view/user/addUser.php');


}
	public static function login(){
        if(!isset($_SESSION["user"])){
		 if(isset($_GET['user'])){
		 	$p = new ModelUser();
		 	$p->userName = $_GET['user'];
		 	$p->pass = $_GET['pass'];
		 	echo $_GET['pass'];
        if($p->checkUser(Model::$PDO,$_GET['user'],$_GET['pass'])==1){
               
               require ('../view/index.php');
        }
        else{
        	//message d'erreur
        	require ('../view/login.php');
        }

        
    }
    else{
    	require ('../view/login.php');
    }}else{
            header('../');
        }}




	public static function deleteByUserName(){
		$PDO = Model::$PDO;
		$Pseudo = $_GET['Pseudo'];
		$status = ModelUser::deleteUser($PDO, $Pseudo);
		if (!$status){
			$message='usernotfound';
			require ('../view/user/error.php');
		}
		else{
			ControllerUser::getAll();
		}

	}




}
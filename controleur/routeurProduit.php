<?php
require_once 'ControllerProduit.php';

//On recupère l'action passée dans l'URL
if (isset($_GET["action"]) && !empty($_GET["action"])){
	$action = $_GET['action'];
}
else{ 
	$action= "getall";
}


ControllerProduit::$action(); // Appel de la méthode statique $action de ControllerVoiture


?>
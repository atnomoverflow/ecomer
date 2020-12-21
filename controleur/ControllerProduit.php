<?php
require_once ('../model/ModelProduit.php'); // chargement du modèle
require_once ('../model/Model.php');
class ControllerProduit{
	
	public static function getAll() {
		//var_dump (Model::$PDO);
		$produits = ModelProduit::getAllProduits(Model::$PDO);     //appel au modèle pour gerer la BD
		require ('../view/produit/product.php');  //redirige vers la vue
	}
	
	public static function getByReferance() {
		$PDO = Model::$PDO;
		$reference = $_GET['reference'];
		$p_tab = ModelProduit::getProduitByreferance($PDO, $reference);
		if (count($p_tab) == 0){
			$message='prodnotfound';
			require ('../view/produit/error.php');
		}
		else{
			$p = $p_tab[0];
			require ('../view/produit/detail.php');
		}
		
	}
	
	public static function add() {
		require ('../view/produit/addForm.php');
		//ModelProduit::addProduit(Model::$PDO);
	}
	
	public static function addProcess() {
		$b=1;
		$p = new ModelProduit();
		if (isset($_GET["reference"]) && !empty($_GET["reference"])){
			$p->reference=$_GET["reference"];
		}else{$b=0;}	
		if (isset($_GET["designation"]) && !empty($_GET["designation"])){
			$p->designation=$_GET["designation"];
		}else{$b=0;}	

		if (isset($_GET["categorie"]) && !empty($_GET["categorie"])){
			$p->categorie=$_GET['categorie'];
		}else{$b=0;}	
		if (isset($_GET["prix_ht"]) && !empty($_GET["prix_ht"])){
			$p->prix_ht=$_GET['prix_ht'];
		}else{$b=0;}	
		if (isset($_GET["qte_en_stock"]) && !empty($_GET["qte_en_stock"])){
			$p->qte_en_stock=$_GET["qte_en_stock"];
		}else{$b=0;}
		if ($b){
			$p->photo = "vide";
			$p->promo = 20;
			$p->tva = 19;
			$status = $p->addProduit(Model::$PDO);
			
			if ($status)
				self:: getAll();
			else{
				
				require ('../view/produit/error.php');
			}
			
		}
		
	}
	public static function deleteByReferance() {
		$PDO = Model::$PDO;
		$reference = $_GET['reference'];
		$status = ModelProduit::deleteProduit($PDO, $reference);
		if (!$status){
			$message='prodnotfound';
			require ('../view/produit/error.php');
		}
		else{
			ControllerProduit::getAll();
		}
		
	}
}

?>
<?php
class ModelProduit{
	private $data=array();
	// La syntaxe ... = NULL signifie que l'argument est optionel
	// Si un argument optionnel n'est pas fourni,
	// alors il prend la valeur par défaut, NULL dans notre cas
	public function __construct($reference=null,$designation=null,$qte_en_stock=null, $prix_ht=null,$photo=null,$promo=null,$tva=null, $categorie=null){
		if (!is_null($designation) && !is_null($prix_ht) && !is_null($qte_en_stock) && !is_null($categorie) && !is_null($reference)) {

			$this->data['reference'] = $reference;
			$this->data['designation'] = $designation;
			$this->data['prix_ht'] = $prix_ht;
			$this->data['qte_en_stock'] = $qte_en_stock;
			$this->data['photo'] = "vide";
			$this->data['promo'] = 19;
			$this->data['tva'] = 20;
			$this->data["prix_ht"] = $categorie;
		}
	}
	public function __get($attr){
		if (!isset($this->data[$attr]))
			return "erreur";
		else return ($this->data[$attr]);
	}
	
	public function __set($attr,$value) {
		$this->data[$attr] = $value; 
	}
	
	public function addProduit($conn){

		try{

			$stm = $conn->prepare("INSERT INTO projet.article(reference,designation,qte_en_stock, prix_HT,photo,promo,TVA, categorie) VALUES (?,?,?,?,?,?,?,?)");

			$stm->execute([$this->data['reference'],$this->data['designation'],$this->data['prix_ht'],$this->data['qte_en_stock'],$this->data['photo'],$this->data['promo'],$this->data['tva'],$this->data["prix_ht"]]);
			
			return true;
		}catch(PDOException $e ){
			if ($e->getCode() == 2300){
				$message=$e->getMessage();
			}
			return false;
		}

	}
	
	public static function getAllProduits($conn){

		$result=$conn->query("SELECT * FROM projet.article");
		if(!$result) {
			$erreur=$conn->errorInfo();
		echo "Lecture impossible, reference", $conn->errorCode(),$erreur[2];
		}
		else{
			//return $result->fetchAll(PDO::FETCH_OBJ);
			return $result->fetchAll(PDO::FETCH_CLASS, 'ModelProduit'); 
		}
	}
	
	public static function getProduitByreferance($conn, $reference){

		$stm = $conn->prepare("SELECT * FROM projet.article WHERE reference=?");
		$stm->execute([$reference]);
		return $stm->fetchAll(PDO::FETCH_CLASS, 'ModelProduit');
	}
	public static function updateQte($conn, $qte_en_stock, $reference){
		$stm = $conn->prepare("UPDATE article SET qte_en_stock=? WHERE reference=?");
		$stm->execute([$qte_en_stock, $reference]);
	}
	public static function deleteProduit($conn, $reference){

		$stm = $conn->prepare("DELETE FROM projet.article WHERE reference=?");
		try{
			$stm->execute([$reference]);

			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}
	
}
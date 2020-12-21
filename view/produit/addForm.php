<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ajout produit</title>
    <!-- Bootstrap core CSS -->
	<link href="inc/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <body>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-1">
<h3> Ajout d'un Produit </h3>
<form action="../../controleur/routeurProduit.php" method="GET">

  <div class="form-group">
    <label for="code">Code</label>
    <input type="text" class="form-control" placeholder="Entrer code" name= "reference">
  </div>
  
  <div class="form-group">
    <label for="des">Désignation</label>
    <input type="text" class="form-control" placeholder="Entrer designation" name= "designation">
  </div>
  
  <div class="form-group">
    <label for="cat">Catégorie</label>
    <select class="form-control" name="categorie">
	<option value="Matériel Informatique">Matériel Informatique</option>
	<option value="Accessoires">Accessoires</option>
	<option value="Meuble Bureau">Meuble Bureau</option>
	</select>
  </div>
  
  <div class="form-group">
    <label for="pu">Prix unitaire</label>
    <input type="text" class="form-control" placeholder="Entrer prix" name= "prix_ht">
  </div>
  
  <div class="form-group">
    <label for="des">Quantité</label>
    <input type="text" class="form-control" placeholder="Entrer quantité" name= "qte_en_stock">
  </div>
  <input type='hidden' name='action' value='addProcess'>
  <button type="submit" class="btn btn-primary" name ="submitProduit">Valider</button>
</form>

	</main>
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Liste des produits</title>
    <!-- Bootstrap core CSS -->
	<link href="inc/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <body>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-1">
	<h3>Liste des Produits</h3>
	<table class="table">
		<thead class="thead-light " >
		<tr>
			<th>reference</th>
			<th>designation</th>
			<th>prix_ht</th>
			<th>Qunatité</th>
			<th>Catégorie</th>
			<th></th>
			<th></th>
		</tr>
		</thead>
		<?php foreach($produits as $p){ ?>
		<tr>
			<td> <?php echo $p->reference?></td>
			<td> <?php echo $p->designation?></td>
			<td> <?php echo $p->prix_HT?></td>
			<td> <?php echo $p->qte_en_stock?></td>
			<td> <?php echo $p->categorie?></td>
			<td> <a href='routeurProduit.php?action=getByReferance&&reference=<?php echo $p->reference?>'> voir détail </a></td>
			<td> <a href='routeurProduit.php?action=deleteByReferance&&reference=<?php echo $p->reference?>'> supprimer </a></td>
		
		</tr>
		<?php } ?>
	</table>
	</main>
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Détail produit</title>
    <!-- Bootstrap core CSS -->
	<link href="inc/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <body>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-1">
	
	<table class="table">
		<thead class="thead-light " >
		<tr>
			<th>Code</th>
			<th>Nom produit</th>
			<th>Prix</th>
			<th>Qunatité</th>
			<th>Catégorie</th>
		</tr>
		</thead>
		
		<tr>
			<td> <?php echo $p->reference?></td>
			<td> <?php echo $p->designation?></td>
			<td> <?php echo $p->prix_ht?></td>
			<td> <?php echo $p->qte_en_stock?></td>
			<td> <?php echo $p->categorie?></td>
		</tr>
	
	</table>
	</main>
  </body>
</html>
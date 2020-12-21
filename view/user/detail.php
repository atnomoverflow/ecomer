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
			<th>Pseudo</th>
			
			<th>mot de passe</th>
		</tr>
		</thead>
		
		<tr>
			<td> <?php echo $p->Pseudo?></td>
			
			<td> <?php echo $p->mp?></td>
		</tr>
	
	</table>
	</main>
  </body>
</html>
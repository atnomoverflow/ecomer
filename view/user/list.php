<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Liste des utilisateur</title>
    <!-- Bootstrap core CSS -->
	<link href="inc/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <body>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-1">
	<h3>Liste des utilisateur</h3>
	<table class="table">
		<thead class="thead-light " >
		<tr>
			<th>Pseudo</th>
			<th>mot de passe</th>
			
		</tr>
		</thead>
		<?php foreach($users as $p){ ?>
		<tr>
			<td> <?php echo $p->Pseudo?></td>
			<td> <?php echo $p->mp?></td>
			<td> <a href='routeurUser.php?action=getByUserName&&Pseudo=<?php echo $p->Pseudo?>'> voir détail </a></td>
			<td> <a href='routeurUser.php?action=deleteByUserName&&Pseudo=<?php echo $p->Pseudo?>'> supprimer </a></td>
		</tr>
		<?php } ?>
	</table>
	</main>
  </body>
</html>
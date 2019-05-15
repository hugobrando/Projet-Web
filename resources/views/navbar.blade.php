<!DOCTYPE html>
<html>
<head>
	<title>header de toute les pages</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- -->
	<link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}" />

	@yield("link")

</head>


<body>
	<div class="container-fluid">

		<nav class="navbar navbar-expand-sm navbar-dark bg-primary fond ">
			<a class="navbar-brand" href="#">
				<img src="image/logo.png" alt="Le logo du site" class="taille">
			</a>

			<a class="navbar-brand" href="#"> 
				<h1>"Nom de l'entreprise"</h1>
			</a>
		   
			<div class="dropdown">
			  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Commande
			  </a>

			  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			    <a class="dropdown-item" href="./order">Commande à passer</a>
			    <a class="dropdown-item" href="./orderHistory">Commande en cours/terminée</a>
			    <a class="dropdown-item" href="./ignoreProduct">Produit désactivé</a>
			  </div>
			</div>

			<div class="dropdown">
			  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Ajouter/Modifier
			  </a>

			  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			    <a class="dropdown-item" href="./createProduct">Un produit</a>
			    <a class="dropdown-item" href="./createUser">Un compte</a>
			    <a class="dropdown-item" href="./editCategory">Une categorie</a>
			  </div>
			</div>
		  	
		    <button class="btn btn-primary" type="button"><a href="./saleHistory" class="deco">Historique des ventes</a></button>

			<form class="form-inline my-2 my-lg-0 nav">
			    <button class="btn btn-success position" type="submit"><a href="./deconnect" class="deco">Déconnexion</a></button>
			</form>
		</nav>
	</div>


@yield("content")

</body>
</html>
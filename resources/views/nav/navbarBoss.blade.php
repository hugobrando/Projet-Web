<!DOCTYPE html>
<html>
<head>
	<title>header de toute les pages</title>
	<link rel="icon" type="image/ico" href="image/index.ico" />

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- -->
	<link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}" />


	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

	@yield("link")

</head>


<body>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-xl navbar-dark bg-primary fond ">
			<a class="navbar-brand" href="./order">
				<img src="image/logo.png" alt="Le logo du site" class="taille">
			</a>

			<a class="navbar-brand" href="./order"> 
				<h1 class="titre">"Nom de l'entreprise"</h1>
			</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">


		      <li class="nav-item active">
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
		      </li>


		      <li class="nav-item">
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
		      </li>


		      <li class="nav-item dropdown">
		        <button class="btn btn-primary" type="button"><a href="./saleHistory" class="deco">Historique des ventes</a></button>
		      </li>


		      
		    </ul>
		    <form class="form-inline my-2 my-lg-0 nav">
		    	<div class="row-2">
		    		<div clas="row">
		    			<p class="positionName deco"><strong>({{auth()->guard('boss')->user()->firstName}} {{auth()->guard('boss')->user()->name}})</strong></p>
		    		</div>
		    		<div clas="row">
		    			<button class="btn btn-success position" type="submit"><a href="./deconnect" class="deco">Déconnexion</a></button>
		    		</div>
		    	</div>
			</form>
		  </div>
		</nav>


	</div>


@yield("content")

</body>
</html>
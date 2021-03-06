<!DOCTYPE html>
<html>
<head>
	<title>StockManagement</title>
	<link rel="icon" type="image/ico" href="image/index.ico" />
	
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
		<nav class="navbar navbar-expand-xl navbar-dark bg-primary fond ">
			<a class="navbar-brand" href="./sale">
				<img src="image/index.jpg" alt="Le logo du site" class="taille">
			</a>

			<a class="navbar-brand" href="./sale"> 
				<h1 class="titre">StockManagement</h1>
			</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <form class="form-inline my-2 my-lg-0 nav">
			    <div class="row-2">
		    		<div clas="row">
		    			<p class="positionName deco"><strong>({{auth()->guard('user')->user()->firstName}} {{auth()->guard('user')->user()->name}})</strong></p>
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
<!DOCTYPE html>
<html>
<head>
	<title>header de toute les pages</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}" />

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
		   

		  	

			<form class="form-inline my-2 my-lg-0 nav">
			    <button class="btn btn-success" type="submit">Déconnexion</button>
			</form>
		</nav>
	</div>


@yield("content")

</body>
</html>
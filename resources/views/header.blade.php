<!DOCTYPE html>
<html>
<head>
	<title>header de toute les pages</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('css/header.css') }}" />

</head>


<body>
	<div class="container-fluid fond">
		<header>
			<div class="row">
				<div class="col-3">
					<img src="image/logo.png" alt="Le logo du site" class="img-fluid taille">
				</div>

				<div class="col-3">
					<h1>Entete du site</h1>
				</div>
				
				<div class="col-6">
					<h1>Navbar</h1>
				</div>
			</div>
			
		</header>
	</div>

@yield("contenu")

</body>
</html>
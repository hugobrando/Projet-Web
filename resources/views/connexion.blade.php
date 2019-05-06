<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('css/connexion.css') }}" />

</head>


<body>
	<div class="container-fluid">
		<div class="col-lg-3  jumbotron  block">
			<h1 class="text-primary">Connexion</h1>
				<form action="POST" class="form-horizontal">
						<div class="form-group">
							<label for="idUtilisateur">Identifiant : </label>
							<input type="text" name="identifiant" id="idUtilisateur" class="form-control">
						</div>
						<div class="form-group">
							<label for="mdp">Mot de passe : </label>
							<input type="password" name="mot de passa" id="mdp" class="form-control">
						</div>
						<div class="form-group">
							<label for="mdpConfirmation">Comfirmation Mot de passe : </label>
							<input type="password" name="Comfirmation du mot de passe" id="mdpConfimation" class="form-control">
						</div>

						<button type="submit" class="btn btn-primary btn-block">Comfirmer</button>
						
						<div class="form-group form-check centrer">
							<input type="checkbox" class="form-check-input" id="Admin">
						    <label class="form-check-label" for="Admin">Admin</label>
						</div>
				</form>

		</div>
	</div>
	
</body>
</html>
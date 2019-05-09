<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('css/connexion.css') }}" />

    <script type='text/javascript' src="{{ URL::asset('js/connexion.js') }}"></script>


</head>


<body>


	<div class="container-fluid">
		<div class="col-lg-3  jumbotron  block">
			<h1 class="text-primary">Connexion</h1>
				<form method="post" class="form-horizontal">
					{{  csrf_field()  }}

						<div class="form-group">
							<label for="idUtilisateur">Identifiant : </label>
							<input type="text" name="id" id="idUtilisateur" class="form-control">
						</div>
						<div class="form-group">
							<label for="mdp">Mot de passe : </label>
							<input type="password" name="mdp" id="mdp" class="form-control">
						</div>
						<div class="form-group">
							<label for="mdpConfirm">Comfirmation Mot de passe : </label>
							<input type="password" name="mdpConfirm" id="mdpConfimation" class="form-control" oninput="checkMdp()">
						    <p class="alert" id="falseMdp"></p>

						</div>

						<button type="submit" class="btn btn-primary btn-block" name="connect">Comfirmer</button>

						@if ($errors->has('connect'))
              			<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('connect') }} </div>  </small>
            			@endif
						
						<div class="form-group form-check centrer">
							<input type="checkbox" class="form-check-input" id="Admin">
						    <label class="form-check-label" for="Admin" >Admin</label>
						    <p id="test"></p>
						</div>
				</form>

		</div>
	</div>
	
</body>
</html>
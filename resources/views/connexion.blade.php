<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<link rel="icon" type="image/ico" href="image/index.ico" />
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('css/connexion.css') }}" />

    <script type='text/javascript' src="{{ URL::asset('js/connexion.js') }}"></script>


</head>


<body>

	@if (session('deconnect'))
	    <div class="alert alert-success">
	        <p>{{ session('deconnect') }}</p>
	    </div>
	@endif
	@if (session('access'))
	    <div class="alert alert-success">
	        <p>{{ session('access') }}</p>
	    </div>
	@endif


	<div class="container-fluid">
		<div class="col-xl-3 col-lg-4 col-md-6 jumbotron  block">
			<h1 class="text-primary">Connexion</h1>
				<form method="post" class="form-horizontal">
					{{  csrf_field()  }}

						<div class="form-group">
							<label for="idUtilisateur">Identifiant : </label>
							<input type="text" name="id" id="idUtilisateur" class="form-control" value="{{old('id')}}">
							@if ($errors->has('id'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('id') }} </div>  </small>
	            			@endif
						</div>
						<div class="form-group">
							<label for="password">Mot de passe : </label>
							<input type="password" name="password" id="password" class="form-control">
							@if ($errors->has('password'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('password') }} </div>  </small>
	            			@endif
						</div>
						<div class="form-group">
							<label for="password_confirmation">Confirmation Mot de passe : </label>
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" oninput="checkMdp()">
							@if ($errors->has('password_confirmation'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('password_confirmation') }} </div>  </small>
	            			@endif
						    <p class="alert" id="falseMdp"></p>

						</div>

						<button type="submit" class="btn btn-primary btn-block" name="connect">Confirmer</button>

						@if ($errors->has('connect'))
              			<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('connect') }} </div>  </small>
            			@endif
						
						<div class="form-group form-check centrer">
							<input type="checkbox" class="form-check-input" id="Admin" name="admin">
						    <label class="form-check-label" for="Admin" >Admin</label>
						</div>
				</form>

		</div>
	</div>
	
</body>
</html>
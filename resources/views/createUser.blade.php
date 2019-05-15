@extends('nav.navbarBoss')

@section('link')
	<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}" />

@endsection

@section('content')

	@if (session('create'))
	    <div class="alert alert-success">
	        {{ session('create') }}
	    </div>
	@endif

	<div class="container-fluid">
		<div class="col-lg-3  jumbotron  block">
			<h1 class="text-primary">Créer un utilisateur</h1>
				<form method="post" class="form-horizontal">
					{{  csrf_field()  }}

						<div class="form-group">
							<label for="name">Nom : </label>
							<input type="text" name="name" class="form-control" value="{{old('name')}}">
							@if ($errors->has('name'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('name') }} </div>  </small>
	            			@endif
						</div>
						<div class="form-group">
							<label for="firstName">Prénom : </label>
							<input type="text" name="firstName" class="form-control" value="{{old('firstName')}}">
							@if ($errors->has('firstName'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('firstName') }} </div>  </small>
	            			@endif
						</div>
						<div class="form-group">
							<label for="mail">Mail : </label>
							<input type="email" name="mail" class="form-control" value="{{old('mail')}}">
							@if ($errors->has('mail'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('mail') }} </div>  </small>
	            			@endif
						</div>
						<div class="form-group">
							<label for="password">Mot de passe : </label>
							<input type="password" name="password" class="form-control">
							@if ($errors->has('password'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('password') }} </div>  </small>
	            			@endif
						</div>
						<div class="form-group">
							<label for="password_confirmation">Confirmer le mot de passe : </label>
							<input type="password" name="password_confirmation" class="form-control">
							@if ($errors->has('password_confirmation'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('password_confirmation') }} </div>  </small>
	            			@endif
						</div>
						
						<div class="form-group form-check centrer">
							<input type="checkbox" class="form-check-input" id="Admin" name="admin">
						    <label class="form-check-label" for="Admin" >Admin</label>
						    <p id="test"></p>
						</div>

						<button type="submit" class="btn btn-primary btn-block" name="create">Comfirmer</button>

				</form>

		</div>
	</div>
@endsection
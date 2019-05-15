@extends('nav.navbarBoss')

@section('link')
	<link rel="stylesheet" href="{{ URL::asset('css/editCategory.css') }}" />

	<script type='text/javascript' src="{{ URL::asset('js/editCategory.js') }}"></script>

@endsection

@section('content')

	@if (session('create'))
	    <div class="alert alert-success">
	        {{ session('create') }}
	    </div>
	@endif

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 jumbotron  block">
				<h1 class="text-primary">Créer une Categorie</h1>
					<form method="post" class="form-horizontal" id="create">
						{{  csrf_field()  }}

							<div class="form-group">
								<label for="wordingCategory">Libellé : </label>
								<input type="text" name="wordingCategory" class="form-control" value="{{old('wordingCategory')}}">
								@if ($errors->has('wordingCategory'))
		              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('wordingCategory') }} </div>  </small>
		            			@endif
							</div>

							<div class="form-group" >
								<label for="criticalStockCategory">Stock Critique : </label>
								<input type="number" name="criticalStockCategory" class="form-control" min="0" id="criticalStockCategory"> 
								@if ($errors->has('criticalStockCategory'))
		              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('criticalStockCategory') }} </div>  </small>
		            			@endif
							</div>

							<button type="submit" class="btn btn-primary btn-block" name="create">Comfirmer</button>

					</form>

			</div>

			<div class="col-lg-3  jumbotron  block">
				<h1 class="text-primary">Modifier un Produit</h1>
					<form method="post" class="form-horizontal" id="edit">
						{{  csrf_field()  }}
						{{method_field('PUT')}}

							<div class="form-group">
								<label for="oldCategory">Categorie : </label>
								 <select name="oldCategory" class="form-control" onclick="getCriticalStock()" id="category">
								 	@foreach($allCategory as $category)
								  		<option value="{{$category->wordingCategory}}">{{$category->wordingCategory}}</option>
								  	@endforeach
								</select> 
							</div>
										

							<div class="form-group" id="wordingCategory">
								
							</div>
								
							<button type="submit" class="btn btn-primary btn-block" name="update">Modifier</button>

					</form>

			</div>
		</div>
	</div>

	<p id="test"></p>

@endsection
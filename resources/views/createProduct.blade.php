@extends('navbar')

@section('link')
	<link rel="stylesheet" href="{{ URL::asset('css/createProduct.css') }}" />

	<script type='text/javascript' src="{{ URL::asset('js/createProduct.js') }}"></script>

@endsection

@section('content')

	@if (session('create'))
	    <div class="alert alert-success">
	        {{ session('create') }}
	    </div>
	@endif

	<div class="container-fluid">
		<div class="col-lg-3  jumbotron  block">
			<h1 class="text-primary">Créer un Produit</h1>
				<form method="post" class="form-horizontal" id="create">
					{{  csrf_field()  }}

						<div class="form-group">
							<label for="wordingProduct">Libellé : </label>
							<input type="text" name="wordingProduct" class="form-control" value="{{old('wordingProduct')}}">
							@if ($errors->has('wordingProduc'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('wordingProduc') }} </div>  </small>
	            			@endif
						</div>
						<div class="form-group">
							<label for="stock">En stock : </label>
							<input type="text" name="stock" class="form-control" value="{{old('stock')}}">
							@if ($errors->has('stock'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('stock') }} </div>  </small>
	            			@endif
						</div>
						<div class="form-group">
							<label for="category">Categorie : </label>
							 <select name="category" class="form-control" onclick="updateCriticalStock()" id="category">
							 	@foreach($allCategory as $category)
							  		<option value="{{$category->wordingCategory}}">{{$category->wordingCategory}}</option>
							  	@endforeach
							</select> 
							@if ($errors->has('mail'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('mail') }} </div>  </small>
	            			@endif
						</div>
												

						<div class="form-group" >
							<label for="criticalStock">Stock Critique : </label>
							<input type="number" name="criticalStock" class="form-control" min="0" id="criticalStock"> 
							@if ($errors->has('criticalStock'))
	              				<small>  <div class="alert alert-danger" role="alert"> {{ $errors->first('criticalStock') }} </div>  </small>
	            			@endif
						</div>
						
						<div class="form-group form-check centrer">
							<input type="checkbox" class="form-check-input" id="order" name="order">
						    <label class="form-check-label" for="order" >Commande en cours</label>
						</div>

						<button type="submit" class="btn btn-primary btn-block" name="create">Comfirmer</button>

				</form>

		</div>
	</div>

@endsection
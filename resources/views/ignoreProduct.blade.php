@extends('navbar')

@section('link')
  <link rel="stylesheet" href="{{ URL::asset('css/ignoreProduct.css') }}" />


@endsection

@section('content')

@if (session('response'))
      <div class="alert alert-success">
          <p>{{ session('response') }}</p>
      </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped visu jumbotron" id="urgentOrder">
              <thead>
                <tr>
                  <h1 class="text-primary visu">Produit désactivé</h1>
                </tr>
                <tr>
                  <th scope="col">Libellé</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Fait par</th>
                  <th scope="col" class="align">Raison</th>
                  <th scope="col">Activer</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                  <form method="post" name="order">
                    {{method_field('PUT')}}
                    {{  csrf_field()  }}

                    <!-- wordingProduct/name/firstName-->
                    <input name="wordingProduct" type="hidden" value="{{$product->wordingProduct}}">
                    <input name="name" type="hidden" value="{{$product->name}}">
                    <input name="firstName" type="hidden" value="{{$product->firstName}}">


                    <tr>
                      <td>{{$product->wordingProduct}}</td>
                      <td>{{$product->stockProduct}}</td>
                      <td>{{$product->name}} {{$product->firstName}}</td>
                      <td> 
                      	<div class="row justify-content-center">
                          <div class="col-7 input-group">
                          	<textarea name="reasonIgnore" class="form-control" placeholder="Raison de la désactivation" rows="2" cols="50">{{$product->reasonIgnore}}</textarea>
                          </div>
                          <div class="col-2">
                            <button type="submit" class="btn btn-primary" name="newReasonProduct">Editer</button>
                          </div>
                        </div>
                      </td>
                  </form>
                      <td>
                        <form method="post" name="delete">
                          {{method_field('DELETE')}}
                          {{  csrf_field()  }}
                          <!-- wordingProduct/name/firstName-->
                          <input name="wordingProduct" type="hidden" value="{{$product->wordingProduct}}">
                          <input name="name" type="hidden" value="{{$product->name}}">
                          <input name="firstName" type="hidden" value="{{$product->firstName}}">
                          <button type="submit" class="btn btn-success" name="activeProduct">X</button>
                        </form>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        
    </div>
</div>

@endsection
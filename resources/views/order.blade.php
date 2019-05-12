@extends('navbar')

@section('link')
  <link rel="stylesheet" href="{{ URL::asset('css/order.css') }}" />
  <script type='text/javascript' src="{{ URL::asset('js/order.js') }}"></script>


@endsection

@section('content')




<div class="container">
  @if ($errors->has('nameProvider'))
    <div class="alert alert-danger" role="alert"> {{ $errors->first('nameProvider') }} </div>
  @endif
  @if ($errors->has('reasonIgnore'))
    <div class="alert alert-danger" role="alert"> {{ $errors->first('reasonIgnore') }} </div>
  @endif
    <div class="row">
        <div class="col-12">
            <table class="table table-striped visu jumbotron">
              <thead>
                <tr>
                  <h1 class="text-primary visu">Produit à commander</h1>
                </tr>
                <tr>
                  <th scope="col">Libellé</th>
                  <th scope="col">Stock</th>
                  <th scope="col">En commande</th>
                  <th scope="col" class="align">Commande</th>
                  <th scope="col">Ignorer</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                  <form method="post" name="order">
                    {{method_field('PUT')}}
                    {{  csrf_field()  }}

                    <!-- wordingProduct-->
                    <input name="wordingProduct" type="hidden" value="{{$product->wordingProduct}}">

                    <tr>
                      <td>{{$product->wordingProduct}}</td>
                      <td>{{$product->stockProduct}}</td>
                      <td>{{$product->order}}</td>
                      <td id="order">
                        <div class="row justify-content-around">
                          <div class="col-2 ">
                            <input type="number" name="order" min="1" class="form-control tailleInputOrder">
                          </div>
                          <div class="col-2 ">
                            <input type="text" name="nameProvider" class="form-control tailleInputNameProvider" placeholder="Nom du fournisseur">
                          </div>
                          <div class="col-5">
                            <button type="submit" class="btn btn-primary" name="orderProduct">Comfirmer la commande</button>
                          </div>
                        </div>
                      </td>
                      <td id="button"><button type="button" class="btn btn-danger" name="ignoreProduct" onclick="getReason()">X</button></td>
                    </tr>
                  </form>
                @endforeach
              </tbody>
            </table>
        </div>
        
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped visu jumbotron">
              <thead>
                <tr>
                  <h1 class="text-primary visu">Autre Produit</h1>
                </tr>
                <tr>
                  <th scope="col">Libellé</th>
                  <th scope="col">Stock</th>
                  <th scope="col">En commande</th>
                  <th scope="col" class="align">Commande</th>
                  <th scope="col">Ignorer</th>
                </tr>
              </thead>
              <tbody>
                @foreach($stockOk as $product)
                  <form method="post">
                    {{method_field('PUT')}}
                    {{  csrf_field()  }}

                    <!-- wordingProduct-->
                    <input name="wordingProduct" type="hidden" value="{{$product->wordingProduct}}">

                    <tr>
                      <td>{{$product->wordingProduct}}</td>
                      <td>{{$product->stockProduct}}</td>
                      <td>{{$product->order}}</td>
                      <td>
                        <div class="row justify-content-around">
                          <div class="col-2 ">
                            <input type="number" name="order" min="1" class="form-control tailleInputOrder">
                          </div>
                          <div class="col-2 ">
                            <input type="text" name="nameProvider" class="form-control tailleInputNameProvider" placeholder="Nom du fournisseur">
                          </div>
                          <div class="col-5">
                            <button type="submit" class="btn btn-primary" name="orderProduct">Comfirmer la commande</button>
                          </div>
                        </div>
                      </td>
                      <td><button type="submit" class="btn btn-danger" name="ignoreProduct">X</button></td>
                    </tr>
                  </form>
                @endforeach
              </tbody>
            </table>
        </div>
        
    </div>
</div>  

@endsection
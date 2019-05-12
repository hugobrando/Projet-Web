@extends('navbar')

@section('link')
  <link rel="stylesheet" href="{{ URL::asset('css/sale.css') }}" />

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped visu jumbotron">
              <thead>
                <tr>
                  <h1 class="text-primary visu">Saisie des Ventes</h1>
                </tr>
                <tr>
                  <th scope="col">Libellé</th>
                  <th scope="col">Stock</th>
                  <th scope="col">En Commande</th>
                  <th scope="col" class="align">Vente</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
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
                          <div class="col-4 ">
                            <input type="number" name="sale" min="0" max="{{$product->stockProduct}}" class="form-control tailleInputStock">
                          </div>
                          <div class="col-4">
                            <button type="submit" class="btn btn-primary" name="saleProduct">Comfirmer la vente</button>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </form>
                @endforeach
              </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection

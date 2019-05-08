@extends('navbar')

@section('link')
  <link rel="stylesheet" href="{{ URL::asset('css/order.css') }}" />

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
          @if ($errors->has('orderProduct'))
                    <small>  <div class="alert alert-danger" role="alert">Le fournisseur est requis</div>  </small>
                  @endif
            <table class="table table-striped visu">
              <thead>
                <tr>
                  <h1 class="text-primary visu">Produit à commander</h1>
                </tr>
                <tr>
                  <th scope="col">Libellé</th>
                  <th scope="col">Stock</th>
                  <th scope="col">En commande</th>
                  <th scope="col" class="align">Commande</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                  <form method="post">
                    {{method_field('PUT')}}
                    {{  csrf_field()  }}

                    <!-- idProduct-->
                    <input name="idProduct" type="hidden" value="{{$product->idProduct}}">

                    <tr>
                      <td>{{$product->wordingProduct}}</td>
                      <td>{{$product->stockProduct}}</td>
                      <td>todo avec js</td>
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
                    </tr>
                  </form>
                @endforeach
              </tbody>
            </table>
        </div>
        
    </div>
</div>

@endsection
@extends('navbar')

@section('link')
  <link rel="stylesheet" href="{{ URL::asset('css/orderHistory.css') }}" />

  <script type='text/javascript' src="{{ URL::asset('js/orderHistory.js') }}"></script>

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped visu jumbotron">
              <thead>
                <tr>
                  <h1 class="text-primary visu">Commande En cours</h1>
                </tr>
                <tr>
                  <th scope="col">Produit</th>
                  <th scope="col">Date de la commande</th>
                  <th scope="col">Fournisseur</th>
                  <th scope="col">Quantité</th>
                </tr>
              </thead>
              <tbody>
                @foreach($EnCours as $order)
                  <form method="post">
                    {{method_field('PUT')}}
                    {{  csrf_field()  }}

                    <!-- idProduct/quantity/idProduct-->
                    <input name="idOrder" type="hidden" value="{{$order->idOrder}}">
                    <input name="quantity" type="hidden" value="{{$order->quantity}}">
                    <input name="idProduct" type="hidden" value="{{$order->idProduct}}">

                    <tr>
                      <td>{{$order->wordingProduct}}</td>
                      <td>{{$order->dateOrder}}</td>
                      <td>{{$order->providerOrder}}</td>
                      <td>{{$order->quantity}}</td>
                  	  <td><button type="submit" class="btn btn-primary" name="finishOrder">Commande Arrivée</button></td>
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
                  <h1 class="text-primary visu">Commande Terminée</h1>
                </tr>
                <tr>
                  <th scope="col">Produit</th>
                  <th scope="col">Date de la commande</th>
                  <th scope="col">Fournisseur</th>
                  <th scope="col">Quantité</th>
                  <th scope="col">Date de Réception</th>
                </tr>
              </thead>
              <tbody>
                @foreach($finish as $order)
                  <form method="post">
                    <tr>
                      <td>{{$order->wordingProduct}}</td>
                      <td>{{$order->dateOrder}}</td>
                      <td>{{$order->providerOrder}}</td>
                      <td>{{$order->quantity}}</td>
                      <td>{{$order->dateReceipt}}</td>
                    </tr>
                  </form>
                @endforeach
              </tbody>
            </table>
        </div>
        
    </div>
</div>


@endsection
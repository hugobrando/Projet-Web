@extends('nav.navbarBoss')

@section('link')
  <link rel="stylesheet" href="{{ URL::asset('css/saleHistory.css') }}" />


@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped visu jumbotron">
              <thead>
                <tr>
                  <h1 class="text-primary visu">Historique des ventes</h1>
                </tr>
                <tr>
                  <th scope="col">Libellé du produit</th>
                  <th scope="col">Vendeur</th>
                  <th scope="col">Quantité</th>
                  <th scope="col" class="align">Date de Vente</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sales as $sale)
                    <tr>
                      <td>{{$sale->wordingProduct}}</td>
                      <td>{{$sale->name}} {{$sale->firstName}}</td>
                      <td>{{$sale->quantity}}</td>
                      <td>{{$sale->dateSale}}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        
    </div>
</div>

@endsection
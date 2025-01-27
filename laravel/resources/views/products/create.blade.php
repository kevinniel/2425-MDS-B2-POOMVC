@extends('layout.main')

@section('content')
    <h1>Ajout d'un produit</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" placeholder="nom">
        </div>
        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" id="price">
        </div>
        <div>
            <button type="submit">Envoyer</button>
        </div>
    </form>
    
    @include('layout.nav')
@endsection
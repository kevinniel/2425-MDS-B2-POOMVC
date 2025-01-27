@extends('layout.main')

@section('content')
    <h1>Modification d'un produit</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" placeholder="nom" value="{{ $product->name }}">
        </div>
        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" id="price"  value="{{ $product->price }}">
        </div>
        <div>
            <button type="submit">Envoyer</button>
        </div>
    </form>
    
    @include('layout.nav')
@endsection
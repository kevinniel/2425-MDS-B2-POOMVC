@extends('layout.main')

@section('content')
    <h1>Produits</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>price</th>
                <th>créé le</th>
                <th>modifié le</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} €</td>
                    <td>{{ $product->create_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" title="Modifier">Modifier</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('layout.nav')
@endsection
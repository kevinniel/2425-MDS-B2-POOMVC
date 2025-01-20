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
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('layout.nav')
@endsection
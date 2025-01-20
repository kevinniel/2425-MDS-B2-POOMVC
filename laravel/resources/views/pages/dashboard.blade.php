@extends('layout.main')

@section('content')
    <h1>Dashboard</h1>
    <p>ce contenu va dans le yield</p>
@endsection

@section('scripts')
    <script>
        console.log("yield scripts");
    </script>
@endsection
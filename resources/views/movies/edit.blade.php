@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar pelicula</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="flex justify-center flex-wrap p-4 mt-5">
        @include("movies.form")
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

@stop

@section('js')
<script src="../path/to/flowbite/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script> console.log('Hi!'); </script>
@stop
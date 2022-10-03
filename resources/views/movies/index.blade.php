@extends('adminlte::page')

@section('title', 'Movies')

@section('content_header')
    <h1>Movies</h1>
@stop

@section('content')
    <p>Welcome to this beautiful movies panel.</p>
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
    <div class="text-center">
        <h1 class="mb-5">{{__("Peliculas") }}</h1>
        <a href="{{ route("movies.create") }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            {{__("Crear nueva pelicula")}}
        </a>
    </div>


<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    #
                </th>
                <th scope="col" class="py-3 px-6">
                    Pelicula
                </th>
                <th scope="col" class="py-3 px-6">
                    Imagen
                </th>
                <th scope="col" class="py-3 px-6">
                    Fecha
                </th>
                <th scope="col" class="py-3 px-6">
                    Actiones
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($moviesArray['data'] as $movie)

            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{"$movie[id]"}}
                </th>
                <td class="py-4 px-6">
                    {{"$movie[name]"}}
                </td>
                <td class="py-4 px-6">
                    {{"$movie[image]"}}
                </td>
                <td class="py-4 px-6">
                    {{"$movie[publication_date]"}}
                </td>
                <td class="py-4 px-6">
                    <a  href="{{ route("movies.edit", [ "movie" =>  "$movie[id]" ]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __("Editar") }}</a>
                    <a 
                    href="#"  
                    class="text-red-400"
                    onclick="event.preventDefault();
                        document.getElementById('delete-movie-{{ "$movie[id]" }}-form').submit();"
                    > {{ __("Eliminar") }}
                    </a>

                    <form id="delete-movie-{{ "$movie[id]" }}-form" action="{{ route("movies.destroy", ["movie" => "$movie[id]"]) }}" method="POST" class="hidden">
                        @method("DELETE")
                        @csrf
                    </form>

                    <a  href="{{ route("movieTurn.create", [ "movie" =>  "$movie[id]" ]) }}" class="font-medium text-blue-600 dark:text-blue-700 hover:underline">{{ __("Asignar") }}</a>

                </td>
            </tr>
        @endforeach

            
        </tbody>
    </table>
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
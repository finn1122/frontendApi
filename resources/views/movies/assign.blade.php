@extends('adminlte::page')

@section('title', 'Asignar turno a pelicula')

@section('content_header')
    <h1>Assignar</h1>
@stop

@section('content')
<form class="w-full max-w-sm" method="POST" action="{{$route}}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    
    @foreach($movieArray as $movie)
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black-300">Nombre de la pelicula: </label>
            <input type="name" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{"$movie[name]"}}" disabled>
            </input>
        </div>
    @endforeach

    @foreach($movieArray as $movie)
        <img class="max-w-xs h-auto" src="{{"$movie[image]"}}" alt="image description" width="150">
        <input id="movie_id" name="movie_id" type="hidden" value="{{"$movie[id]"}}">
    @endforeach



    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <div class="flex justify-center">
                <div class="mb-3 w-96">
                    <div class="datepicker relative form-floating mb-3 xl:w-96">
                    <label for="floatingInput" class="text-gray-700">fecha</label>
                        <input type="date"
                        name="publication_date"
                        id="publication_date"
                            @foreach($movieArray as $movie)
                            value="{{"$movie[publication_date]"}}"
                            @endforeach
                        disabled
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Select a date" />
                    </div>
                </div>
            </div>
        </div>      
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 m-4">

        <label for="active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Asigna un turno</label>
        <select  id="turn_id" name="turn_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="" selected>Selecciona</option>
            @foreach($turnsArray['data'] as $turn)
            <option value="{{"$turn[id]"}}">{{"$turn[turn]"}}</option>
            @endforeach
        </select>
        </div>


  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
        <div class="md:w-2/3">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded" type="submit">
            {{$textButton}}
        </button>
        </div>
  </div>
</form>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
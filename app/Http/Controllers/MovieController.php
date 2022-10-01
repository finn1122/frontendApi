<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MovieController extends Controller
{
    public function index(){
        
        //$movies = HTTP::get('http://127.0.0.1:8001/api/v2/movies');
        //$token = '1|UiwettJXITy8hPq84WNU5FZUQ5u0GzeBnCaCc1rb';
        //$movies = Http::withToken($token)->get('http://127.0.0.1:8001/api/v2/movies');
    
        //$usuarios = $movies->json();

        //dd($usuarios);

        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';

        /*$httpClient = new Client();

        $response = $httpClient->get(
            'http://127.0.0.1:8001/api/v2/movies?bearer',
            [
                RequestOptions::HEADERS => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]
        );

        $moviesArray = $response->getBody();

        $response->getHeader('Content-Length');

        $data = $response->json();

        echo $data;*/

        $moviesArray = Http::withToken($token)->get('http://127.0.0.1:8001/api/v2/movies');
        return view('movies.index', compact('moviesArray'));

        //return view('movies.index');
    }

    public function create(){
        $title = __("Crear pelicula");
        $textButton = __("Crear");
        $route = route("movies.store");
        return view("movies.create", compact("title","textButton", "route"));
    }

    public function edit($movie){

        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';

        $update = true;
        $moviesArray = Http::withToken($token)->get('http://127.0.0.1:8001/api/v2/movies/'.$movie)->collect();
        $title = __("Editar pelicula");
        $textButton = __("Guardar");
        $route = route("movies.update", [ "movie" => $movie ]);
        return view("movies.edit", compact("title","textButton", "route", "moviesArray","update"));
        
    }

    public function update(Request $request, $movie){
        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';

        //falta mostrar un mensaje de que se actualizo con exito
        Http::withToken($token)->put('http://127.0.0.1:8001/api/v2/movies/'.$movie.'?'.$request);
        return  back()->with("success", __("¡Pelicula actualizado!"));
        //echo $request->publication_date;
    }

    public function store(Request $request){
        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';
        $name = $request->name;
        $publication_date = $request->publication_date;
        $image = $request->image;

        Http::withToken($token)->post('http://127.0.0.1:8001/api/v2/movies/?'.$request);
        return  back()->with("success", __("¡Pelicula guardada!"));

        
    }

    public function show()
    {

    }

    public function destroy($id){
        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';

        Http::withToken($token)->delete('http://127.0.0.1:8001/api/v2/movies/'.$id);
        return  back()->with("success", __("¡Pelicula eliminada!"));
    }

    public function assign(Request $request){

        $id = $request->movie;
        $textButton = 'Asignar';
        $route = route("movies.guardarAsignacion");
        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';
        $movieArray = Http::withToken($token)->get('http://127.0.0.1:8001/api/v2/movies/'.$id)->collect();

        $turnsArray = Http::withToken($token)->get('http://127.0.0.1:8001/api/v2/turns');

        //echo $movieArray;
        return view("movies.assign", compact("movieArray", "textButton", "turnsArray", "route"));
    }

    public function guardarAsignacion(Request $request){

        
    }
}

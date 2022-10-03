<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

//importar libreria para validar request
use Validator;


class MovieController extends Controller
{
    public function index(){
        
        $token = '1|39vaZmsyhxBcUo2eqTIvuwJmi6RknPhp06rZNAQd';
        $moviesArray = Http::withToken($token)->get('http://127.0.0.1:8000/api/v2/movies');
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

        $token = '1|39vaZmsyhxBcUo2eqTIvuwJmi6RknPhp06rZNAQd';

        $update = true;
        $moviesArray = Http::withToken($token)->get('http://127.0.0.1:8000/api/v2/movies/'.$movie)->collect();
        $title = __("Editar pelicula");
        $textButton = __("Guardar");
        $route = route("movies.update", [ "movie" => $movie ]);
        return view("movies.edit", compact("title","textButton", "route", "moviesArray","update"));
        
    }

    public function update(Request $request, $movie){
        $token = '1|39vaZmsyhxBcUo2eqTIvuwJmi6RknPhp06rZNAQd';

        //falta mostrar un mensaje de que se actualizo con exito
        $validator = Http::withToken($token)->put('http://127.0.0.1:8000/api/v2/movies/'.$movie.'?'.$request);

        return  back()->with("success", __("¡Pelicula actualizado!"));
        //echo $request->publication_date;
    }

    public function store(Request $request){
        $token = '1|39vaZmsyhxBcUo2eqTIvuwJmi6RknPhp06rZNAQd';
        $name = $request->name;
        $publication_date = $request->publication_date;
        $image = $request->image;

        Http::withToken($token)->post('http://127.0.0.1:8000/api/v2/movies/?'.$request);
        return  back()->with("success", __("¡Pelicula guardada!"));

        
    }

    public function show()
    {

    }

    public function destroy($id){
        $token = '1|39vaZmsyhxBcUo2eqTIvuwJmi6RknPhp06rZNAQd';

        Http::withToken($token)->delete('http://127.0.0.1:8000/api/v2/movies/'.$id);
        return  back()->with("success", __("¡Pelicula eliminada!"));
    }

    
}

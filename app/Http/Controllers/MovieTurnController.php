<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MovieTurnController extends Controller
{

    public function index(){
        
        $token = '1|39vaZmsyhxBcUo2eqTIvuwJmi6RknPhp06rZNAQd';
        $movieTurnsArray = Http::withToken($token)->get('http://127.0.0.1:8000/api/v2/movieTurn');
        return view('movieTurn.index', compact('movieTurnsArray'));
        //return view('movies.index');
        //echo $movieTurnsArray;

    }
    
    public function create(Request $request){

        $id = $request->movie;
        $textButton = 'Asignar';
        $route = route("movieTurn.store");
        $token = '1|39vaZmsyhxBcUo2eqTIvuwJmi6RknPhp06rZNAQd';
        $movieArray = Http::withToken($token)->get('http://127.0.0.1:8000/api/v2/movies/'.$id)->collect();

        $turnsArray = Http::withToken($token)->get('http://127.0.0.1:8000/api/v2/turns');

        //echo $movieArray;
        return view("movies.assign", compact("movieArray", "textButton", "turnsArray", "route"));
    }

    public function store(Request $request){

        $token = '1|39vaZmsyhxBcUo2eqTIvuwJmi6RknPhp06rZNAQd';
        $movie_id = $request->movie_id;
        $turn_id = $request->turn_id;
        Http::withToken($token)->post('http://127.0.0.1:8000/api/v2/movieTurn/?'.$request);
        return  back()->with("success", __("¡Asignación guardada!"));
        
    }

    public function edit($movieTurn){

    }

    public function destroy(){

    }
}

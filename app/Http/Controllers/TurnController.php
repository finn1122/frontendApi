<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TurnController extends Controller
{
    public function index(){
        
        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';
        $turnsArray = Http::withToken($token)->get('http://127.0.0.1:8001/api/v2/turns');
        return view('turns.index', compact('turnsArray'));
        //return view('movies.index');
    }

    public function create(){
        $title = __("Crear turno");
        $textButton = __("Crear");
        $route = route("turns.store");
        return view("turns.create", compact("title","textButton", "route"));
    }

    public function edit($turn){
        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';

        $update = true;
        $turnsArray = Http::withToken($token)->get('http://127.0.0.1:8001/api/v2/turns/'.$turn)->collect();
        $title = __("Editar pelicula");
        $textButton = __("Guardar");
        $route = route("turns.update", [ "turn" => $turn]);
        return view("turns.edit", compact("title","textButton", "route", "turnsArray","update"));
    }


    public function update(Request $request, $turn){
        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';

        //falta mostrar un mensaje de que se actualizo con exito
        Http::withToken($token)->put('http://127.0.0.1:8001/api/v2/turns/'.$turn.'?'.$request);
        return  back()->with("success", __("¡Pelicula actualizado!"));
        //echo $request->turn;
    }

    public function store(Request $request){
        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';
        //$turn = $request->turn;
        //$active = $request->active;
        //$image = $request->image;

        Http::withToken($token)->post('http://127.0.0.1:8001/api/v2/turns/?'.$request);
        return  back()->with("success", __("¡Turno guardad!"));

        //echo $turn.$active;
    }


    public function destroy($id){
        $token = '1|RLGhLeYnrqlkytoqizqlg1uMqHLaZHxoSCowPlob';

        Http::withToken($token)->delete('http://127.0.0.1:8001/api/v2/turns/'.$id);
        return  back()->with("success", __("¡Turno eliminado!"));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;


class MovieController extends Controller
{
    public function movies(){
        
        $movies = HTTP::get('http://127.0.0.1:8001/api/v2/movies');
        //$token = '1|UiwettJXITy8hPq84WNU5FZUQ5u0GzeBnCaCc1rb';
        //$movies = Http::withToken($token)->get('http://127.0.0.1:8001/api/v2/movies');
    
        //$usuarios = $movies->json();

        //dd($usuarios);

        $token = '1|UiwettJXITy8hPq84WNU5FZUQ5u0GzeBnCaCc1rb';

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

        $moviesArray = Http::withToken('1|UiwettJXITy8hPq84WNU5FZUQ5u0GzeBnCaCc1rb')->get('http://127.0.0.1:8001/api/v2/movies');
        return view('admin.movies', compact('moviesArray'));

        //return view('movies.index');
    }
}

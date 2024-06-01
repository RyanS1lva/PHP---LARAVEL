<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RickAndMortyController extends Controller
{
    public function getCharactersById(int $id = 1){
        $url = "https://rickandmortyapi.com/api/character/{$id}";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($ch);

        curl_close($ch);

        $character = json_decode($data, true);

        return view('character', ['character' => $character]);
    }
}

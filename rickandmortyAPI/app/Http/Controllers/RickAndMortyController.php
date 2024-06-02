<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RickAndMortyController extends Controller
{
    public function getCharactersById(Request $request, int $id = 1){

          if ($request->has('id') && $request->input('id') != '') {
            $id = $request->input('id');
        }

        $url = "https://rickandmortyapi.com/api/character/{$id}";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($ch);

        curl_close($ch);

        $character = json_decode($data, true);
        $origin = $character['origin']['name'];


        switch($character['status']){
            case 'Alive':
                $status = 'Vivo';
                break;
            case 'Dead':
                $status = 'Morto';
                break;
            case 'unknown':
                $status = 'Desconhecido';
                break;
        }

        switch($origin){
            case 'unknown':
                $origin = 'Desconhecido';
                break;
        }

        return view('character', ['character' => $character, 'status' => $status, 'origin' => $origin]);
    }
}

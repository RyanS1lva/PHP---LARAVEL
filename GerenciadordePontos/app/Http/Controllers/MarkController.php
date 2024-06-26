<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MarkController extends Controller
{
    public $userID;
    public function __construct () {
        // Armazenando o id do usuário logado.
        $this->userID = Auth::id();
    }

    // Método para retornar os registros na view.
    public function index () {
        // Armazenando na variável o horário atual.
        $time = Carbon::now();
        // Armazendo na variável o dia atual.
        $today = $time->toDateString();

        // Buscando no banco de dados os registros de ponto onde é filtrado o dia atual e ordenado por horário.
        $marksToday = Mark::whereDate('horario', $today)->orderby('horario')->get();

        // Interpreta os dados para a view, atribuindo o 1 como "Entrada" e 0 como "Saída".
        foreach($marksToday as $mark){
            if($mark->entrada == 1){
                $mark->entrada = 'Entrada';
            }elseif($mark->entrada == 0){
                $mark->entrada = 'Saída';
            }
        }
        
        // Retornando na view os registros de ponto do dia.
        return view('mark_index', ['marksToday' => $marksToday]);
    }


    // Método para salvar o registro de ponto no banco de dados.
    public function store () {
        // Armazenando nas variáveis o horário e dia atual.
        $time = Carbon::now();
        $today = $time->toDateString();
        
        // Buscando pelo último registro de ponto do dia atual.
        $lastMark = Mark::where('user_id', $this->userID)
        ->whereDate('horario', $today)
        ->latest()
        ->first();

        // Caso o retorno do último registro do dia seja nulo ou seja 0 (Saída), é então criado um novo registro de ponto sendo atribuido como entrada, salvo também o id do usuário autenticado e o horário atual.
        if($lastMark == null || $lastMark->entrada == 0){
            $mark = new Mark();
            $mark->horario = $time;
            $mark->entrada = 1;
            $mark->user_id = Auth::id();
            $mark->save();
        }


        // Caso o retorno do último registro do dia seja 1 (Entrada), é então criado um novo registro de ponto sendo atribuido como saída, salvo também o id do usuário autenticado e o horário atual.
        elseif($lastMark->entrada == 1){
            $mark = new Mark();
            $mark->horario = $time;
            $mark->entrada = 0;
            $mark->user_id = Auth::id();
            $mark->save();
        }

    
        return redirect()->route('mark.index');
    }


    // Método para deslogar o usuário.
    public function destroy () {
        Auth::logout();
        
        return redirect()->route('home.index');
    }
}

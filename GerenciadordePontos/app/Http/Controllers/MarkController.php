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
        $this->userID = Auth::id();
    }

    public function index () {
        $time = Carbon::now();
        $today = $time->toDateString();

        $marksToday = Mark::whereDate('horario', $today)->orderby('horario')->get();

        foreach($marksToday as $mark){
            if($mark->entrada == 1){
                $mark->entrada = 'Entrada';
            }elseif($mark->entrada == 0){
                $mark->entrada = 'Saída';
            }
        }
        
        return view('mark_index', ['marksToday' => $marksToday]);
    }

    public function store () {
        $time = Carbon::now();
        $today = $time->toDateString();
        
        $lastMark = Mark::where('user_id', $this->userID)
        ->whereDate('horario', $today)
        ->latest()
        ->first();

        if($lastMark == null || $lastMark->entrada == 0){
            $mark = new Mark();
            $mark->horario = $time;
            $mark->entrada = 1;
            $mark->user_id = Auth::id();
            $mark->save();
        }

        elseif($lastMark->entrada == 1){
            $mark = new Mark();
            $mark->horario = $time;
            $mark->entrada = 0;
            $mark->user_id = Auth::id();
            $mark->save();
        }

    
        return redirect()->route('mark.index');
    }

    public function destroy () {
        Auth::logout();
        
        return redirect()->route('home.index');
    }
}

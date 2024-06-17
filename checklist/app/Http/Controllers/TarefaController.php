<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public readonly Tarefa $tarefa;
    public function __construct () {
        $this->tarefa = new Tarefa; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = $this->tarefa->all();
        return view('tarefas', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->tarefa->create([
            'nome' => $request->input('tarefa'),
        ]);
        if($created){
            return redirect()->back()->with('message', 'Tarefa adicionada com sucesso!');
        }

        return redirect()->back()->with('message', 'Não foi possível adicionar a tarefa, tente novamente mais tarde!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        return view('tarefa_edit', ['tarefa' => $tarefa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->tarefa->where('id', $id)->update($request->except('_token', '_method'));

        if($updated){
            return redirect()->back()->with('message', 'Registro alterado com sucesso!');

            return redirect()->back()->with('message', 'Erro ao atualizar registro!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->tarefa->where('id', $id)->delete();
        return redirect()->back();
    }
}

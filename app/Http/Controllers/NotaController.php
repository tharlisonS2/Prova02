<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Turma;
use App\Models\Aluno;
use App\Models\Nota;
class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get("id")==""){
            $nota= new Nota();
        }else{
            $nota= Nota::Find($request->get("id"));
        }
        $nota->nota=$request->get("nota");
        $nota->aluno=$request->get("nomealuno");
        $nota->turma=$request->get("alunoturma");
        if($request->get("id")==""){
            
            $request->Session()->flash("acao","salvo");
        }else{
            
            $request->Session()->flash("acao","atualizado");
        }
        $nota->save();
        return redirect("/nota");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $turma = Turma::Find($id);
        $turmas = Turma::ALL();
        $aluno = new Aluno();
        $alunos = Aluno::ALL();
        return view("nota",[
            "id" =>$id,
            "aluno" =>$aluno,
            "alunos" =>$alunos,
            "turma" =>$turma,
            "turmas" =>$turmas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

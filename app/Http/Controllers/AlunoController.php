<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;
class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aluno = new Aluno();
        $alunos = Aluno::All();
        return view("turma",[
            "aluno" => $aluno,
            "alunos" => $alunos
        ]);
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
            $aluno= new Aluno();
        }else{
            $aluno= Aluno::Find($request->get("id"));
        }
        $aluno->nome=$request->get("nome");
        $aluno->email=$request->get("email");
        $aluno->matricula=$request->get("matricula");
        $aluno->turma=$request->get("turma");
        if($request->get("id")==""){
            
            $request->Session()->flash("acao","salvo");
        }else{
            
            $request->Session()->flash("acao","atualizado");
        }
        $aluno->save();
        return redirect("/aluno");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::Find($id);
        $alunos = Aluno::ALL();
        $turma = Turma::Find($id);
        $turmas = Turma::ALL();
        return view("aluno",[
            "aluno" =>$aluno,
            "alunos" =>$alunos,
            "turma" =>$turma,
            "turmas" =>$turmas]);
        
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

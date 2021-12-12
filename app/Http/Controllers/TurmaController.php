<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turma = new Turma();
        $turmas = Turma::All();
        return view("turma",[
            "turma" => $turma,
            "turmas" => $turmas
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
            $turma= new Turma();
        }else{
            $turma= Turma::Find($request->get("id"));
        }
        $turma->nomeTurma=$request->get("nomeTurma");
        $turma->nomeCurso=$request->get("nomeCurso");
        if($request->get("id")==""){
            
            $request->Session()->flash("acao","salvo");
        }else{
            
            $request->Session()->flash("acao","atualizado");
        }
        $turma->save();
        return redirect("/turma");
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
        $turma = Turma::Find($id);
        $turmas = Turma::ALL();
        return view("turma",[
            "turma" =>$turma,
            "turmas" =>$turmas
        ]);
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
    public function destroy(Request $request, $id)
    {
        Turma::Destroy($id);
        $request->Session()->flash("acao","deletado");
        return redirect("/turma");
    }
}

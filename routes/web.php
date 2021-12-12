<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NotaController;
use App\Models\Turma;
use App\Models\Aluno;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resources([
    "turma" => TurmaController::class,
    "aluno" => AlunoController::class,
    "nota"  => NotaController::class
]);
Route::get('/', function () {
    return view("home");
});
Route::get('/nota', function () {
    $turma = new Turma();
    $turmas = Turma::ALL();
    $aluno = new Aluno();
    $alunos = Aluno::ALL();
    $id=0;
    return view("nota",[
        "id" =>$id,
        "aluno" =>$aluno,
        "alunos" =>$alunos,
        "turma" =>$turma,
        "turmas" =>$turmas]);
})->name('nota');
Route::get('/turma',function(){
    $turma = new Turma();
    $turmas = Turma::ALL();
    return view("turma",[
        "turma" =>$turma,
        "turmas" =>$turmas]);
    })->name('turma');
    Route::get('/aluno',function(){
        $aluno = new Aluno();
        $alunos = Aluno::ALL();
        $turma = new Turma();
    $turmas = Turma::ALL();
        return view("aluno",[
            "aluno" =>$aluno,
            "alunos" =>$alunos,
            "turma" =>$turma,
            "turmas" =>$turmas]);
        })->name('aluno');
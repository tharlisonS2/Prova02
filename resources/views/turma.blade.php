@extends("template.master")
@section("titulo", "Cadastro de Turmas")
@section("cadastro")
<form action="/turma" method="POST" class="row">
@csrf
<input type="hidden" name="id" value="{{$turma->id}}"/>
<h4>Cadastro de Turmas</h4>

    <div class="form-group col-5">
			<label for="nome">Nome: </label>
			<input type="text" name="nomeTurma" class="form-control" value="{{$turma->nomeTurma}}" required />
	</div>

    <div class="form-group col-5">
    <label for="nome">Curso: </label>
			<input type="text" name="nomeCurso" class="form-control" value="{{$turma->nomeCurso}}" required />
	</div>

		<div class="form-group col">
</br>
			<a href="/turma" class="btn btn-primary bottom"> 
				<i class="fas fa-plus"></i>Novo</a>
			<button type="submit" class="btn btn-success bottom"><i class="fas fa-save"></i>Salvar</button>
		</div>
</form>
@endsection
@section("listagem")
</br><h4>Listagem</h4>
        <table  class="table table-striped responsive">
            <colgroup>

			    <col width="170">
			    <col width="150">
			    <col width="10">
			    <col width="10">
		    </colgroup>
            <thead>
                <tr>
                    <th>Nome Turma</th>
                    <th>Nome Curso</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            @foreach($turmas as $turma)
                <tr>
                    <td>{{$turma->nomeTurma}}</td>
                    <td>{{$turma->nomeCurso}}</td>
                    <td><a href="/turma/{{$turma->id}}/edit"><button class="btn btn-warning"><i class="far fa-edit"></i>Editar</button></a></td>
                    <td>
                        <form action="/turma/{{$turma->id}}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="DELETE"/>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja Excluir?')"><i class="far fa-trash-alt"></i>Excluir</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

@endsection
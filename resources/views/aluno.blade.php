@extends("template.master")
@section("titulo", "Cadastro de Alunos")
@section("cadastro")

<form action="/aluno" method="POST" class="row">
@csrf
<input type="hidden" name="id" value=""/>
<h4>Cadastro de alunos</h4>

    <div class="form-group col-6">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" class="form-control" value="" required />
	</div>
    <div class="form-group col-6">
        <label for="nome">Email: </label>
		<input type="text" name="email" class="form-control" value="" required />
	</div>
    <div class="form-group col-6">
        <label for="nome">Matricula: </label>
		<input type="text" name="matricula" class="form-control" value="" required />
	</div>
    <div class="form-group col-6">
        <label for="nome">Turma: </label>
        <select name="turma" class="form-control" required>
			<option></option>
			@foreach ($turmas as $turma)
				@if ($turma->id == $aluno->turma)
					<option value="{{ $turma->id }}" selected="selected">{{ $turma->nomeTurma }}</option>
				@else
					<option value="{{ $turma->id }}">{{ $turma->nomeTurma }}</option>
				@endif
			@endforeach
		</select>
	</div>
    
		<div class="form-group col">
</br>
			<a href="/aluno" class="btn btn-primary bottom"> 
				<i class="fas fa-plus"></i>Novo</a>
			<button type="submit" class="btn btn-success bottom"><i class="fas fa-save"></i>Salvar</button>
		</div>
</form>
@endsection
@section("listagem")
</br><h4>Listagem</h4>
        <table  class="table table-striped responsive">
            <colgroup>

			    <col width="200">
			    <col width="150">
			    <col width="100">
			    <col width="10">
			    <col width="10">
			    <col width="10">
		    </colgroup>
            <thead>
                <tr>
                    <th>Nome aluno</th>
                    <th>Email</th>
                    <th>Matricula</th>
                    <th>Turma</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{$aluno->nome}}</td>
                    <td>{{$aluno->email}}</td>
                    <td>{{$aluno->matricula}}</td>
                    <td>@foreach ($turmas as $turma)
				            @if($turma->id == $aluno->turma)
					            {{$turma->nomeTurma}}
                                @break
				            @endif
			            @endforeach
                    </td>
                    <td><a href="/aluno/{{$aluno->id}}/edit"><button class="btn btn-warning"><i class="far fa-edit"></i>Editar</button></a></td>
                    <td>
                        <form action="/aluno/{{$aluno->id}}" method="POST">
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
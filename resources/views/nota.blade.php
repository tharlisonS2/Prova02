@extends("template.master")
@section("titulo", "Cadastro de Notas")

@section("cadastro")

<form action="/nota" method="POST" class="row">
@csrf
<input type="hidden" name="id" value="{{$turma->id}}"/>
<h4>Cadastro de Notas</h4>

<script>
$(document).ready(function() {

  $('#select').change(function() {

    valor = $("#select").val();
    
    location.replace("{{ route('nota') }}/"+valor);
  });

});
</script>

    <div class="form-group col-12">
        <label for="nome">Turma: </label>
        <select name="select" class="form-control" id="select"required>
			<option ></option>
            
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
	</div>
</form>
@endsection
@section("listagem")
</br><h4>Listagem</h4>

        <table  class="table table-striped responsive">
            <colgroup>

			    <col width="150">
			    <col width="150">
			    <col width="100">
			    <col width="50">
			    <col width="10">
			    
		    </colgroup>
            <thead>
                <tr>
                    <th>Nome aluno</th>
                    <th>Email aluno</th>
                    <th>Matricula aluno</th>
                    <th>Nota aluno</th>
                    
                </tr>
            </thead>
            <tbody>
            
            @foreach($alunos as $aluno)
            <tr>
            @if($id == $aluno->turma)
                <td>{{$aluno->nome}}</td>
                <td>{{$aluno->email}}</td>
                <td>{{$aluno->matricula}}</td>
                <td> <form action="/nota" method="POST" class="col">
                        @csrf
                        <input type="hidden" name="nomealuno" value="{{$aluno->id}}"/>
                        <input type="hidden" name="alunoturma" value="{{$aluno->turma}}"/>
                            <input type="number" class="form-control w-10"  name="nota" min="0" max="10" required >
                            <button type="submit" class="btn btn-success col-12" >Distribuir</button>
                        </form></input></td>
            @endif
            @endforeach
            </tr>
            </tbody>
        </table>

@endsection
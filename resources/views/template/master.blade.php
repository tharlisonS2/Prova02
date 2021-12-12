<!DOCTYPE html>

<head>
   <title> @yield("titulo")</title>
   <link rel="stylesheet"href="{{asset('css/bootstrap.css')}}"/>
   <link rel="stylesheet"href="{{asset('css/custom.css')}}"/>
   <link rel="stylesheet" href="{{ asset('css/all.css') }}" />
   
   <script src="{{ asset('js/jquery.js') }}"></script>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">   
</head>
<body>
    <nav id="menu-h">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/turma">Cadastrar Turma</a></li>
                <li><a href="/aluno">Cadastrar Aluno</a></li>
                <li><a href="/nota">Cadastrar Nota</a></li>
                <li><a href="#">@yield("titulo")</a></li>
            </ul>
    </nav>
    @if (Session::get("acao") == "salvo")
		<div class="alert alert-success" role="alert">
			Salvo com sucesso!
		</div>
	@endif
		
	@if (Session::get("acao") == "deletado")
		<div class="alert alert-danger" role="alert">
			Excluído com sucesso!
		</div>
	@endif
    @if(Session::get("acao")=="atualizado")
        <div class="alert alert-info" role="alert">
            Dados Atualizados!
        </div>
    @endif
    @if(Session::get("acao")=="errodata")
        <div class="alert alert-danger" role="alert">
            Data invalida!
        </div>
    @endif
    <div class= "container">
        <div>
            @yield("home")
            @yield("cadastro")
            @yield("listagem")
        </div>
        
    </div>
</body>
</html>
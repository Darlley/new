<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased bg-indigo-300">
        <div class="container container-user mx-auto flex items-center justify-center min-h-screen">
            <div class="container-view bg-blue-50">
                <form action="/" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h2>Envie o seu contato</h2>
                    </div>
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" placeholder="Seu name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Seu email">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" name="password" placeholder="Sua senha">
                    </div>

                    <button type="submit" class="form-button">
                        Enviar
                    </button>
                </form>
            </div>
            <div class="container-view bg-blue-50 ">
                @if(count($users)>0)
                <ul>
                    <h2>Users</h2>
                    @foreach($users as $user)
                    <li>
                        <div>
                            <strong>Usuário {{ $user->id }}: {{ $user->name }}</strong> <br>
                            Login: <em>{{ $user->email }}</em>                          <br>
                            Senha: <em>{{ $user->password }}</em>
                        </div>
                        <div>
                            <form action="{{ $user->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="list-button">
                                    Deletar
                                </button>
                            </form>
                        </div>

                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </body>
</html>

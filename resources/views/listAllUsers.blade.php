<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de usuários</title>
</head>
<body>
    <a href="{{ route('users.formAddUser') }}">Adicionar novo</a>
    <table>
        <tr>
            <td>#ID</td>
            <td>Nome:</td>
            <td>E-mail:</td>
            <td>Ações:</td>
        </tr>

        @foreach ( $users as $user )
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.list', ['user' => $user->id]) }}">Ver usuário</a>
                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="user" value="{{ $user->id }}">
                        <input type="submit" value="Remover">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
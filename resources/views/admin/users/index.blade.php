@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Usuários
    </h1>
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success" style="float: right">Novo Usuário</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-info">Editar</a>
                                @if($loggedId !== intval($user->id))
                                    <form class="d-inline"
                                          method="POST"
                                          action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                          onsubmit="return confirm('Tem certeza que deseja excluir o usuário {{$user->name}}?')"
                                    >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    {{$users->links()}}

@endsection

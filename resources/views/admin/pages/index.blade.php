@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Minhas Páginas
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
            <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success" style="float: right">Nova Página</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="80">ID</th>
                    <th>Título</th>
                    <th width="200">Ações</th>
                </tr>
                </thead>
                @foreach ($pages as $page)
                    <tbody>
                    <tr>
                        <td>{{$page->id}}</td>
                        <td>{{$page->title}}</td>
                        <td>
                            <a href="" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            <a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="btn btn-sm btn-info">Editar</a>
                                <form class="d-inline"
                                      method="POST"
                                      action="{{ route('pages.destroy', ['page' => $page->id]) }}"
                                      onsubmit="return confirm('Tem certeza que deseja excluir a página?')"
                                >
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    {{$pages->links()}}

@endsection

@extends('adminlte::page')

@section('title', 'Filiais')

@section('content')
    <h1>Filiais</h1>
    <a href="{{ route('filiais.create') }}" class="btn btn-primary mb-3">Nova Filial</a>
    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Nome</th><th>Ações</th></tr>
        </thead>
        <tbody>
            @foreach ($filiais as $filial)
                <tr>
                    <td>{{ $filial->id }}</td>
                    <td>{{ $filial->nome }}</td>
                    <td>
                        <a href="{{ route('filiais.edit', $filial) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('filiais.destroy', $filial) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

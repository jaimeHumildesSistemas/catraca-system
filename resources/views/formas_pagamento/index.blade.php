@extends('adminlte::page')

@section('title', 'Formas de Pagamento')

@section('content_header')
    <h1>Formas de Pagamento</h1>
@endsection

@section('content')
    <a href="{{ route('formas-pagamento.create') }}" class="btn btn-primary mb-3">Nova Forma de Pagamento</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formasPagamento as $forma)
                <tr>
                    <td>{{ $forma->id }}</td>
                    <td>{{ $forma->nome }}</td>
                    <td>{{ $forma->tipo }}</td>
                    <td>
                        <a href="{{ route('formas-pagamento.edit', $forma) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('formas-pagamento.destroy', $forma) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir esta forma?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

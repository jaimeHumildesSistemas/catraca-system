@extends('adminlte::page')

@section('title', isset($formaPagamento) ? 'Editar Forma' : 'Nova Forma de Pagamento')

@section('content')
    <h1>{{ isset($formaPagamento) ? 'Editar' : 'Nova' }} Forma de Pagamento</h1>

    <form action="{{ isset($formaPagamento) ? route('formas-pagamento.update', $formaPagamento) : route('formas-pagamento.store') }}" method="POST">
        @csrf
        @if(isset($formaPagamento)) @method('PUT') @endif

        <div class="mb-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{ old('nome', $formaPagamento->nome ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo">Tipo (opcional)</label>
            <input type="text" class="form-control" name="tipo" value="{{ old('tipo', $formaPagamento->tipo ?? '') }}">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('formas-pagamento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

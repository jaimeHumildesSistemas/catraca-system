@extends('adminlte::page')

@section('title', isset($filial) ? 'Editar Filial' : 'Nova Filial')

@section('content')
    <h1>{{ isset($filial) ? 'Editar' : 'Nova' }} Filial</h1>

    <form action="{{ isset($filial) ? route('filiais.update', $filial) : route('filiais.store') }}" method="POST">
        @csrf
        @if(isset($filial)) @method('PUT') @endif
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $filial->nome ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('filiais.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

@extends('adminlte::page')

@section('title', 'Nova Movimentação')

@section('content_header')
    <h1>Nova Movimentação</h1>
@stop

@section('content')
    <form action="{{ route('movimentacoes.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="form-group col-md-4">
                <label>Filial</label>
                <select name="filial_id" class="form-control" required>
                    <option value="">Selecione...</option>
                    @foreach($filiais as $f)
                        <option value="{{ $f->id }}">{{ $f->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Forma de Pagamento</label>
                <select name="forma_pagamento_id" class="form-control" required>
                    <option value="">Selecione...</option>
                    @foreach($formas_pagamento as $fp)
                        <option value="{{ $fp->id }}">{{ $fp->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Tipo</label>
                <select name="tipo" class="form-control" required>
                    <option value="entrada">Entrada</option>
                    <option value="saida">Saída</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label>Valor</label>
                <input type="number" name="valor" step="0.01" class="form-control" required>
            </div>

            <div class="form-group col-md-3">
                <label>Data</label>
                <input type="date" name="data_movimentacao" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label>Descrição</label>
                <input type="text" name="descricao" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('movimentacoes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@stop

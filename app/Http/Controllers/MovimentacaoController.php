<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use App\Models\Filial;
use App\Models\FormaPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimentacaoController extends Controller
{
    /**
     * Exibe todas as movimentações do usuário logado.
     */
    public function index()
    {
        $movimentacoes = Movimentacao::with(['filial', 'formaPagamento', 'usuario'])
            ->orderBy('data_movimentacao', 'desc')
            ->paginate(20);

        return view('movimentacoes.index', compact('movimentacoes'));
    }

    /**
     * Exibe o formulário de criação de uma nova movimentação.
     */
    public function create()
    {
        $filiais = Filial::all();
        $formas_pagamento = FormaPagamento::all();

        return view('movimentacoes.create', compact('filiais', 'formas_pagamento'));
    }

    /**
     * Armazena uma nova movimentação no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'filial_id' => 'required|exists:filiais,id',
            'forma_pagamento_id' => 'required|exists:formas_pagamento,id',
            'tipo' => 'required|in:entrada,saida',
            'valor' => 'required|numeric|min:0.01',
            'descricao' => 'nullable|string|max:255',
            'data_movimentacao' => 'required|date',
        ]);

        Movimentacao::create([
            'user_id' => Auth::id(),
            'filial_id' => $request->filial_id,
            'forma_pagamento_id' => $request->forma_pagamento_id,
            'tipo' => $request->tipo,
            'valor' => $request->valor,
            'descricao' => $request->descricao,
            'data_movimentacao' => $request->data_movimentacao,
        ]);

        return redirect()->route('movimentacoes.index')
                         ->with('success', 'Movimentação registrada com sucesso!');
    }
}

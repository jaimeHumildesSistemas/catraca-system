<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;

class FormaPagamentoController extends Controller
{
    public function index()
    {
        $formasPagamento = FormaPagamento::all();
        return view('formas_pagamento.index', compact('formasPagamento'));
    }

    public function create()
    {
        return view('formas_pagamento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required'
        ]);

        FormaPagamento::create($request->all());

        return redirect()->route('formas_pagamento.index')->with('success', 'Forma de pagamento criada com sucesso.');
    }

    public function edit(FormaPagamento $formaPagamento)
    {
        return view('formas_pagamento.edit', compact('formaPagamento'));
    }

    public function update(Request $request, FormaPagamento $formaPagamento)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required'
        ]);

        $formaPagamento->update($request->all());

        return redirect()->route('formas_pagamento.index')->with('success', 'Forma de pagamento atualizada com sucesso.');
    }

    public function destroy(FormaPagamento $formaPagamento)
    {
        $formaPagamento->delete();
        return redirect()->route('formas_pagamento.index')->with('success', 'Forma de pagamento excluída com sucesso.');
    }
}

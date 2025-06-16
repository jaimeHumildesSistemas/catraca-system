<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    public function index()
    {
        $filiais = Filial::all();
        return view('filiais.index', compact('filiais'));
    }

    public function create()
    {
        return view('filiais.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required']);
        Filial::create($request->all());
        return redirect()->route('filiais.index')->with('success', 'Filial criada com sucesso.');
    }

    public function edit(Filial $filial)
    {
        return view('filiais.edit', compact('filial'));
    }

    public function update(Request $request, Filial $filial)
    {
        $request->validate(['nome' => 'required']);
        $filial->update($request->all());
        return redirect()->route('filiais.index')->with('success', 'Filial atualizada.');
    }

    public function destroy(Filial $filial)
    {
        $filial->delete();
        return redirect()->route('filiais.index')->with('success', 'Filial deletada.');
    }
}

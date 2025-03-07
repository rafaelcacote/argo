<?php

namespace App\Http\Controllers;

use App\Models\OrdemDeServico;
use Illuminate\Http\Request;

class OrdemDeServicosController extends Controller
{
    public function index()
    {
        $ordens = OrdemDeServico::all();
        return view('ordem_de_servicos.index', compact('ordens'));
    }

    public function create()
    {
        $statusValues = OrdemDeServico::getStatusValues();

        return view('ordem_de_servicos.create', compact('statusValues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'descricao' => 'required|string|max:255',
            'status' => 'required|in:pendente,em andamento,concluído',
        ]);

        OrdemDeServico::create($request->all());
        return redirect()->route('ordem_de_servicos.index')->with('success', 'Ordem de serviço criada com sucesso.');
    }

    public function edit($id)
    {
        $ordem = OrdemDeServico::findOrFail($id);
        return view('ordem_de_servicos.edit', compact('ordem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'descricao' => 'required|string|max:255',
            'status' => 'required|in:pendente,em andamento,concluído',
        ]);

        $ordem = OrdemDeServico::findOrFail($id);
        $ordem->update($request->all());
        return redirect()->route('ordem_de_servicos.index')->with('success', 'Ordem de serviço atualizada com sucesso.');
    }

    public function show($id)
    {
        $ordem = OrdemDeServico::findOrFail($id);
        return view('ordem_de_servicos.show', compact('ordem'));
    }
}

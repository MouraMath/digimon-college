<?php

namespace App\Http\Controllers;

use App\Models\Digimon;
use Illuminate\Http\Request;

class DigimonController extends Controller
{
    /**
     * Exibe a lista de digimons com ordenação
     */
    public function index(Request $request)
    {
        // Obtém os parâmetros de ordenação da requisição ou usa valores padrão
        $column = $request->input('sort', 'nome');
        $direction = $request->input('direction', 'asc');
        
        // Validação de segurança para evitar SQL injection
        $validColumns = ['nome', 'level', 'atributo', 'tipo'];
        $column = in_array($column, $validColumns) ? $column : 'nome';
        
        $validDirections = ['asc', 'desc'];
        $direction = in_array($direction, $validDirections) ? $direction : 'asc';
        
        // Busca os digimons ordenados e paginados
        $digimons = Digimon::orderBy($column, $direction)->paginate(10);
        
        // Passa os digimons e parâmetros de ordenação para a view
        return view('digimons.index', [
            'digimons' => $digimons,
            'column' => $column,
            'direction' => $direction
        ]);
    }

    /**
     * Exibe o formulário para criar um novo digimon
     */
    public function create()
    {
        $levels = Digimon::$levels;
        $atributos = Digimon::$atributos;
        $tipos = Digimon::$tipos;
        
        return view('digimons.create', compact('levels', 'atributos', 'tipos'));
    }

    /**
     * Armazena um novo digimon no banco de dados
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'level' => 'required|in:' . implode(',', Digimon::$levels),
            'atributo' => 'required|in:' . implode(',', Digimon::$atributos),
            'tipo' => 'required|in:' . implode(',', Digimon::$tipos),
        ]);
        
        // Cria o digimon com os dados validados
        Digimon::create($validated);
        
        // Redireciona para a lista com mensagem de sucesso
        return redirect()->route('digimons.index')
            ->with('success', 'Digimon criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um digimon específico
     */
    public function show(Digimon $digimon)
    {
        return view('digimons.show', compact('digimon'));
    }

    /**
     * Exibe o formulário para editar um digimon existente
     */
    public function edit(Digimon $digimon)
    {
        $levels = Digimon::$levels;
        $atributos = Digimon::$atributos;
        $tipos = Digimon::$tipos;
        
        return view('digimons.edit', compact('digimon', 'levels', 'atributos', 'tipos'));
    }

    /**
     * Atualiza um digimon específico no banco de dados
     */
    public function update(Request $request, Digimon $digimon)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'level' => 'required|in:' . implode(',', Digimon::$levels),
            'atributo' => 'required|in:' . implode(',', Digimon::$atributos),
            'tipo' => 'required|in:' . implode(',', Digimon::$tipos),
        ]);
        
        // Atualiza o digimon com os dados validados
        $digimon->update($validated);
        
        // Redireciona para a lista com mensagem de sucesso
        return redirect()->route('digimons.index')
            ->with('success', 'Digimon atualizado com sucesso!');
    }

    /**
     * Remove um digimon específico do banco de dados
     */
    public function destroy(Digimon $digimon)
    {
        $digimon->delete();
        
        return redirect()->route('digimons.index')
            ->with('success', 'Digimon excluído com sucesso!');
    }
}

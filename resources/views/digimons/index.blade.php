@extends('layouts.app')

@section('title', 'Lista de Digimons')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center page-header">
            <h1><i class="fas fa-dragon me-2"></i> Lista de Digimons</h1>
            <a href="{{ route('digimons.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Adicionar Digimon
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="card mb-4">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Digimons Cadastrados</h5>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('digimons.index') }}" method="GET" class="d-flex mt-2 mt-md-0">
                            <input type="text" name="search" class="form-control me-2" placeholder="Buscar digimon..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @if($digimons->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-responsive-card mb-0">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="{{ route('digimons.index', ['sort' => 'nome', 'direction' => $column == 'nome' && $direction == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark d-flex align-items-center">
                                            Nome
                                            @if($column == 'nome')
                                                <i class="fas fa-sort-{{ $direction == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('digimons.index', ['sort' => 'level', 'direction' => $column == 'level' && $direction == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark d-flex align-items-center">
                                            Level
                                            @if($column == 'level')
                                                <i class="fas fa-sort-{{ $direction == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('digimons.index', ['sort' => 'atributo', 'direction' => $column == 'atributo' && $direction == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark d-flex align-items-center">
                                            Atributo
                                            @if($column == 'atributo')
                                                <i class="fas fa-sort-{{ $direction == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('digimons.index', ['sort' => 'tipo', 'direction' => $column == 'tipo' && $direction == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark d-flex align-items-center">
                                            Tipo
                                            @if($column == 'tipo')
                                                <i class="fas fa-sort-{{ $direction == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($digimons as $digimon)
                                <tr>
                                    <td data-label="Nome">{{ $digimon->nome }}</td>
                                    <td data-label="Level">
                                        <span class="badge text-white badge-level badge-{{ strtolower($digimon->level) }}">
                                            {{ $digimon->level }}
                                        </span>
                                    </td>
                                    <td data-label="Atributo">
                                        <span class="badge text-white badge-attribute badge-{{ strtolower($digimon->atributo) }}">
                                            {{ $digimon->atributo }}
                                        </span>
                                    </td>
                                    <td data-label="Tipo">{{ $digimon->tipo }}</td>
                                    <td class="text-center" data-label="Ações">
                                        <a href="{{ route('digimons.show', $digimon) }}" class="btn btn-sm btn-info text-white" title="Visualizar">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('digimons.edit', $digimon) }}" class="btn btn-sm btn-primary" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('digimons.destroy', $digimon) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-delete" title="Excluir">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <img src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png" alt="Sem dados" style="width: 120px; opacity: 0.5;">
                        <p class="mt-3 text-muted">Nenhum digimon encontrado.</p>
                        <a href="{{ route('digimons.create') }}" class="btn btn-primary mt-2">
                            <i class="fas fa-plus me-1"></i> Adicionar Digimon
                        </a>
                    </div>
                @endif
            </div>
            @if($digimons->count() > 0)
                <div class="card-footer bg-white">
                    <div class="<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0"> <p class="text-muted mb-0">Exibindo {{ $digimons->firstItem() ?? 0 }} a 
                        {{ $digimons->lastItem() ?? 0 }} de {{ $digimons->total() }} registros</p> </div> <div> {{ $digimons->withQueryString()->links() }}
                             </div> </div> </div> @endif </div> </div> </div> @endsection ```

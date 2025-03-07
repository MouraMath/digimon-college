@extends('layouts.app')

@section('title', 'Detalhes do Digimon')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center page-header">
            <h1><i class="fas fa-eye me-2" aria-hidden="true"></i> Detalhes do Digimon</h1>
            <a href="{{ route('digimons.index') }}" class="btn btn-secondary" aria-label="Voltar para a lista">
                <i class="fas fa-arrow-left me-1" aria-hidden="true"></i> Voltar
            </a>
        </div>
        
        <div class="digimon-detail-card slide-up">
            <div class="digimon-header text-center">
                <div class="digimon-avatar">
                    <i class="fas fa-dragon" aria-hidden="true"></i>
                </div>
                <h2>{{ $digimon->nome }}</h2>
                <div class="d-flex justify-content-center gap-2 mt-3">
                    <span class="badge text-white badge-level badge-{{ strtolower($digimon->level) }}">
                        {{ $digimon->level }}
                    </span>
                    <span class="badge text-white badge-attribute badge-{{ strtolower($digimon->atributo) }}">
                        {{ $digimon->atributo }}
                    </span>
                </div>
            </div>
            
            <div class="digimon-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="digimon-attribute">
                            <div class="attribute-label">Nome:</div>
                            <div class="attribute-value">{{ $digimon->nome }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Level:</div>
                            <div class="attribute-value">{{ $digimon->level }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Atributo:</div>
                            <div class="attribute-value">{{ $digimon->atributo }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Tipo:</div>
                            <div class="attribute-value">{{ $digimon->tipo }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Data de Cadastro:</div>
                            <div class="attribute-value">{{ $digimon->created_at->format('d/m/Y H:i:s') }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Última Atualização:</div>
                            <div class="attribute-value">{{ $digimon->updated_at->format('d/m/Y H:i:s') }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="{{ route('digimons.edit', $digimon) }}" class="btn btn-primary me-md-2" aria-label="Editar {{ $digimon->nome }}">
                        <i class="fas fa-edit me-1" aria-hidden="true"></i> Editar
                    </a>
                    <form action="{{ route('digimons.destroy', $digimon) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-delete" aria-label="Excluir {{ $digimon->nome }}">
                            <i class="fas fa-trash me-1" aria-hidden="true"></i> Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mt-4 fade-in">
            <div class="card-header bg-white">
                <h5 class="mb-0">Ações Rápidas</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{ route('digimons.index') }}" class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                            <i class="fas fa-list fa-2x mb-2" aria-hidden="true"></i>
                            <span>Listar Todos</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{ route('digimons.create') }}" class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                            <i class="fas fa-plus-circle fa-2x mb-2" aria-hidden="true"></i>
                            <span>Adicionar Novo</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{ route('digimons.edit', $digimon) }}" class="btn btn-outline-info w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                            <i class="fas fa-edit fa-2x mb-2" aria-hidden="true"></i>
                            <span>Editar Este</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <button type="button" class="btn btn-outline-danger w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" onclick="document.querySelector('.btn-delete').click()">
                            <i class="fas fa-trash fa-2x mb-2" aria-hidden="true"></i>
                            <span>Excluir Este</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

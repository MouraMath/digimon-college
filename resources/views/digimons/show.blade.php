@extends('layouts.app')

@section('title', 'Detalhes do Digimon')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center page-header">
            <h1><i class="fas fa-eye me-2"></i> Detalhes do Digimon</h1>
            <a href="{{ route('digimons.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Voltar
            </a>
        </div>
        
        <div class="digimon-detail-card">
            <div class="digimon-header text-center">
                <div class="digimon-avatar">
                    <i class="fas fa-dragon"></i>
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
                            <div>{{ $digimon->nome }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Level:</div>
                            <div>{{ $digimon->level }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Atributo:</div>
                            <div>{{ $digimon->atributo }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Tipo:</div>
                            <div>{{ $digimon->tipo }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Data de Cadastro:</div>
                            <div>{{ $digimon->created_at->format('d/m/Y H:i:s') }}</div>
                        </div>
                        
                        <div class="digimon-attribute">
                            <div class="attribute-label">Última Atualização:</div>
                            <div>{{ $digimon->updated_at->format('d/m/Y H:i:s') }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="{{ route('digimons.edit', $digimon) }}" class="btn btn-primary me-md-2">
                        <i class="fas fa-edit me-1"></i> Editar
                    </a>
                    <form action="{{ route('digimons.destroy', $digimon) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-delete">
                            <i class="fas fa-trash me-1"></i> Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

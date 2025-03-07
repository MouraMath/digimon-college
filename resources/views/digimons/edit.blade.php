@extends('layouts.app')

@section('title', 'Editar Digimon')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center page-header">
            <h1><i class="fas fa-edit me-2" aria-hidden="true"></i> Editar Digimon</h1>
            <a href="{{ route('digimons.index') }}" class="btn btn-secondary" aria-label="Voltar para a lista">
                <i class="fas fa-arrow-left me-1" aria-hidden="true"></i> Voltar
            </a>
        </div>
        
        <div class="card slide-up">
            <div class="card-header bg-white">
                <h5 class="mb-0">Editando: {{ $digimon->nome }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('digimons.update', $digimon) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $digimon->nome) }}" required aria-describedby="nomeHelp">
                        <div id="nomeHelp" class="form-text">Digite o nome do Digimon.</div>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required aria-describedby="levelHelp">
                            <option value="">Selecione um level</option>
                            @foreach($levels as $level)
                                <option value="{{ $level }}" {{ old('level', $digimon->level) == $level ? 'selected' : '' }}>{{ $level }}</option>
                            @endforeach
                        </select>
                        <div id="levelHelp" class="form-text">Selecione o nível de evolução do Digimon.</div>
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="atributo" class="form-label">Atributo</label>
                        <div class="row">
                            @foreach($atributos as $atributo)
                                <div class="col-6 col-md-3 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="atributo" id="atributo_{{ $atributo }}" value="{{ $atributo }}" {{ old('atributo', $digimon->atributo) == $atributo ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="atributo_{{ $atributo }}">
                                            <span class="badge text-white badge-attribute badge-{{ strtolower($atributo) }}">{{ $atributo }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="atributoHelp" class="form-text">Selecione o atributo do Digimon.</div>
                        @error('atributo')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required aria-describedby="tipoHelp">
                            <option value="">Selecione um tipo</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo }}" {{ old('tipo', $digimon->tipo) == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                            @endforeach
                        </select>
                        <div id="tipoHelp" class="form-text">Selecione o tipo do Digimon.</div>
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('digimons.index') }}" class="btn btn-secondary me-md-2" aria-label="Cancelar e voltar">
                            <i class="fas fa-times me-1" aria-hidden="true"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary" aria-label="Atualizar digimon">
                            <i class="fas fa-save me-1" aria-hidden="true"></i> Atualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Adicionar validação visual em tempo real
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('input, select');
        
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.checkValidity()) {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                } else {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                }
            });
        });
    });
</script>
@endsection

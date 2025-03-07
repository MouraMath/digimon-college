@extends('layouts.app')

@section('title', 'Adicionar Digimon')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center page-header">
            <h1><i class="fas fa-plus-circle me-2"></i> Adicionar Digimon</h1>
            <a href="{{ route('digimons.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Voltar
            </a>
        </div>
        
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Preencha os dados do novo Digimon</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('digimons.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                            <option value="">Selecione um level</option>
                            @foreach($levels as $level)
                                <option value="{{ $level }}" {{ old('level') == $level ? 'selected' : '' }}>{{ $level }}</option>
                            @endforeach
                        </select>
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="atributo" class="form-label">Atributo</label>
                        <select class="form-select @error('atributo') is-invalid @enderror" id="atributo" name="atributo" required>
                            <option value="">Selecione um atributo</option>
                            @foreach($atributos as $atributo)
                                <option value="{{ $atributo }}" {{ old('atributo') == $atributo ? 'selected' : '' }}>{{ $atributo }}</option>
                            @endforeach
                        </select>
                        @error('atributo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                            <option value="">Selecione um tipo</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo }}" {{ old('tipo') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                            @endforeach
                        </select>
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('digimons.index') }}" class="btn btn-secondary me-md-2">
                            <i class="fas fa-times me-1"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

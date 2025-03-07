@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Digimon</h1>
    
    <form action="{{ route('digimons.update', $digimon) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $digimon->nome) }}" required>
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <input type="text" class="form-control @error('level') is-invalid @enderror" id="level" name="level" value="{{ old('level', $digimon->level) }}" required>
            @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo" value="{{ old('tipo', $digimon->tipo) }}" required>
            @error('tipo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="elemento" class="form-label">Elemento</label>
            <input type="text" class="form-control @error('elemento') is-invalid @enderror" id="elemento" name="elemento" value="{{ old('elemento', $digimon->elemento) }}" required>
            @error('elemento')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('digimons.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

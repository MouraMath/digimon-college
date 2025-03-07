@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Novo Digimon</h1>
    
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
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('digimons.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

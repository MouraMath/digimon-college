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
            <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                <option value="">Selecione um level</option>
                @foreach($levels as $level)
                    <option value="{{ $level }}" {{ old('level', $digimon->level) == $level ? 'selected' : '' }}>{{ $level }}</option>
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
                    <option value="{{ $atributo }}" {{ old('atributo', $digimon->atributo) == $atributo ? 'selected' : '' }}>{{ $atributo }}</option>
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
                    <option value="{{ $tipo }}" {{ old('tipo', $digimon->tipo) == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                @endforeach
            </select>
            @error('tipo')
                <div class="invalid-feedback">{{ $message }}</div>

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Digimon</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $digimon->nome }}</h5>
            <p class="card-text"><strong>Level:</strong> {{ $digimon->level }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $digimon->tipo }}</p>
            <p class="card-text"><strong>Elemento:</strong> {{ $digimon->elemento }}</p>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('digimons.edit', $digimon) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('digimons.index') }}" class="btn btn-secondary">Voltar</a>
        <form action="{{ route('digimons.destroy', $digimon) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
    </div>
</div>
@endsection

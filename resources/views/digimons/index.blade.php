@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Digimons</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="mb-3">
        <a href="{{ route('digimons.create') }}" class="btn btn-primary">Adicionar Novo Digimon</a>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    <a href="{{ route('digimons.index', ['sort' => 'nome', 'direction' => $column == 'nome' && $direction == 'asc' ? 'desc' : 'asc']) }}">
                        Nome
                        @if($column == 'nome')
                            <i class="fas fa-sort-{{ $direction == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('digimons.index', ['sort' => 'level', 'direction' => $column == 'level' && $direction == 'asc' ? 'desc' : 'asc']) }}">
                        Level
                        @if($column == 'level')
                            <i class="fas fa-sort-{{ $direction == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('digimons.index', ['sort' => 'tipo', 'direction' => $column == 'tipo' && $direction == 'asc' ? 'desc' : 'asc']) }}">
                        Tipo
                        @if($column == 'tipo')
                            <i class="fas fa-sort-{{ $direction == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('digimons.index', ['sort' => 'elemento', 'direction' => $column == 'elemento' && $direction == 'asc' ? 'desc' : 'asc']) }}">
                        Elemento
                        @if($column == 'elemento')
                            <i class="fas fa-sort-{{ $direction == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </a>
                </th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($digimons as $digimon)
            <tr>
                <td>{{ $digimon->nome }}</td>
                <td>{{ $digimon->level }}</td>
                <td>{{ $digimon->tipo }}</td>
                <td>{{ $digimon->elemento }}</td>
                <td>
                    <a href="{{ route('digimons.show', $digimon) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('digimons.edit', $digimon) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('digimons.destroy', $digimon) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $digimons->withQueryString()->links() }}
</div>
@endsection

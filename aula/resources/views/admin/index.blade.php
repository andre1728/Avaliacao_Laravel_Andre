@extends('layout.site')

@section('titulo', 'Cursos')

@section('conteudo')
    <div class="container">
        <h3>Lista de Cursos</h3>
        @if(!empty($mensagem))
            <div class="alert alert-success">
                {{ $mensagem }}
            </div>
        @endif
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Publicado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                        <tr>
                            <td>{{ $curso->id }}</td>
                            <td>{{ $curso->titulo }}</td>
                            <td>{{ $curso->descricao }}</td>
                            <td>{{ $curso->imagem }}</td>
                            <td>{{ $curso->publicado }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('admin.cursos.editar', $curso->id) }}">Editar</a>
                                <form action="{{ route('admin.cursos.deletar', $curso->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn btn-success" href="{{ route('admin.cursos.adicionar') }}">Adicionar</a>
        </div>
    </div>
@endsection
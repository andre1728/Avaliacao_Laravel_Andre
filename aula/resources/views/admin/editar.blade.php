@extends('layout.site')

@section('titulo', 'Editar Curso')


@section('conteudo')
    <div class="container">
        <h3>Editar Curso</h3>
        <div class="row">
            <form action="{{ route('admin.cursos.atualizar', $curso->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.cursos.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
@extends('layout.site')

@section('titulo', 'Adicionar Curso')


@section('conteudo')
    <div class="container">
        <h3>Adiconar Curso</h3>
        <div class="row">
            <form action="{{ route('admin.cursos.salvar') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @include('admin.cursos.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
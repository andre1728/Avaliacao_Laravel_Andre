<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $contatos = [
            (object)['nome' => 'Maria', 'tel' => '3334555666'],
            (object)['nome' => 'Pedro', 'tel' => '7219371289']
        ];

        return view('contato.index', compact('contatos'));
    }

    public function criar(Request $req)
    {
        //dd($req['nome']);
        dd($req->all());
        return 'criar';
    }

    public function editar()
    {
        return 'editar';
    }

    public function adicionar()
    {
        echo 'adicionado';
    }


   /* @extends('layout.site')

@section('titulo', 'Adicionar Curso')


@section('conteudo')
    <div class="container">
        <h3>Adiconar Curso</h3>
        <div class="row">
            <form action="{{ route('admin.cursos.salvar') }}" method="post">
                @csrf
                @include('admin.cursos.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()*/


}



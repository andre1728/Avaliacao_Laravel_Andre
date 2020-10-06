<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratoController extends Controller
{
   
    public function index(Request $req)
    {
        $contratos = Contrato::all();
        $mensagem = $req->session()->get('mensagem');
        return view('admin.contratos.index', compact('contratos', 'mensagem'));
    }

    public function adicionar()
    {
        return view('admin.contratos.adicionar');
    }

    public function salvar(Request $req)
    {
        $contratos = $req->all();

        if (isset($contrato['publicado'])) {
            $contrato['publicado'] = 'sim';
        }

        if ($req->hasFile('imagem')) {
            $contrato['imagem'] = $this->tratarImagem($req, $contrato);
        }

        Certidao::create($contrato);

        $req->session()
          ->flash(
              'mensagem',
              "Curso de $req->tipo_contrato adicionado com sucesso"
          );

        return redirect()->route('admin.contratos');
    }

    public function editar($id)
    {
        $contrato = Contrato::find($id);

        return view('admin.contratos.editar', compact('contrato'));
    }

    public function atualizar(Request $req, $id)
    {
        $contrato= $req->all();

        if (isset($contrato['publicado'])) {
            $contrato['publicado'] = 'sim';
        } else {
            $contrato['publicado'] = 'nao';
        }

        if ($req->hasFile('imagem')) {
            $contrato['imagem'] = $this->tratarImagem($req, $contrato);
        }

        $contSelecionado = Contrato::find($id);
        $contSelecionado->update($contrato);

        $req->session()
            ->flash(
                'mensagem',
                "Contrato de $contSelecionado->tipo_contrato atualizado com sucesso"
            );

        return redirect()->route('admin.contratos');
    }

    public function deletar(Request $req, $id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();

        $req->session()
            ->flash(
                'mensagem',
                "Contrato de $contrato->tipo_contrato removido com sucesso"
            );

        return redirect()->route('admin.contratos');
    }

    public function tratarImagem(Request $req, $contrato)
    {
        $imagem = $req->file('imagem');
        $num = rand(1111, 9999);
        $dir = 'img/certidoes/';
        $ext = $imagem->guessClientExtension();
        $nomeImagem = 'imagem_' . $num . '.' . $ext;
        $imagem->move($dir, $nomeImagem);

        return $dir . $nomeImagem;
    }
















}

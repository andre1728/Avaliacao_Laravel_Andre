<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertidaoController extends Controller
{
    

    public function index(Request $req)
    {
        $certidoes = Certidao::all();
        $mensagem = $req->session()->get('mensagem');
        return view('admin.certidoes.index', compact('certidoes', 'mensagem'));
    }

    public function adicionar()
    {
        return view('admin.certidoes.adicionar');
    }

    public function salvar(Request $req)
    {
        $certidao = $req->all();

        if (isset($curso['publicado'])) {
            $certidao['publicado'] = 'sim';
        }

        if ($req->hasFile('imagem')) {
            $certidao['imagem'] = $this->tratarImagem($req, $certidao);
        }

        Certidao::create($certidao);

        $req->session()
          ->flash(
              'mensagem',
              "Curso de $req->tipo_certidao adicionado com sucesso"
          );

        return redirect()->route('admin.certidoes');
    }

    public function editar($id)
    {
        $certidao = Certidao::find($id);

        return view('admin.cursos.editar', compact('certidao'));
    }

    public function atualizar(Request $req, $id)
    {
        $certidao = $req->all();

        if (isset($certidao['publicado'])) {
            $certidao['publicado'] = 'sim';
        } else {
            $certidao['publicado'] = 'nao';
        }

        if ($req->hasFile('imagem')) {
            $certidao['imagem'] = $this->tratarImagem($req, $certidao);
        }

        $certSelecionada = Certidao::find($id);
        $certSelecionada->update($certidao);

        $req->session()
            ->flash(
                'mensagem',
                "Curso de $certSelecionada->tipo_certidao atualizado com sucesso"
            );

        return redirect()->route('admin.cursos');
    }

    public function deletar(Request $req, $id)
    {
        $certidao = Certidao::find($id);
        $certidao->delete();

        $req->session()
            ->flash(
                'mensagem',
                "Curso de $certidao->tipo_certidao removido com sucesso"
            );

        return redirect()->route('admin.cursos');
    }

    public function tratarImagem(Request $req, $certidao)
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

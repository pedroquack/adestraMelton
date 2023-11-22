<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\Postagem;
use App\Models\Comentario;
use App\Models\Breed;
use App\Models\Relatorio;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function createReport(){
        $this->authorize('viewAny', Relatorio::class);
        //Chamados
        $dataChamado = array();
        $dataChamado = $this->getDataChamado();
        //Postagens
        $dataPosts = array();
        $dataPosts = $this->getDataPosts();
        $pdf = Pdf::loadView('relatorio', compact('dataChamado','dataPosts'));
        return $pdf->stream('adestraMeltonRelatorio');
    }
    private function getDataChamado(){
        $chamados = Chamado::orderBy('id')->get();
        $data = array();
        $cont = 0;
        foreach($chamados as $cham){
            $data[$cont]['nomeTutor'] = $cham->nomeTutor;
            $data[$cont]['telefone'] = $cham->telefone;
            $data[$cont]['nomeCachorro'] = $cham->nomeCachorro;
            $data[$cont]['breed'] = (Breed::find($cham->breed_id))->breed;
            $data[$cont]['peso'] = $cham->peso;
            $data[$cont]['idade'] = $cham->idade;
            $data[$cont]['pessoas'] = $cham->pessoas;
            $data[$cont]['animais'] = $cham->animais;
            $data[$cont]['descricao'] = $cham->descricao;
            $cont++;
        }
        return $data;
    }
    private function getDataPosts(){
        $posts = Postagem::orderBy('id')->get();
        $data = array();
        $cont = 0;
        foreach($posts as $post){
            $data[$cont]['nome'] = $post->nome;
            $data[$cont]['breed'] = (Breed::find($post->breed_id))->breed;
            $data[$cont]['peso'] = $post->peso;
            $cont++;
        }
        return $data;
    }
}


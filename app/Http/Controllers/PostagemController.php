<?php

namespace App\Http\Controllers;
use App\Models\Postagem;
use App\Models\Breed;
use Illuminate\Http\Request;

class PostagemController extends Controller
{   
    private $path = "fotos/postagens";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Postagem::orderBy('id')->get();
        return view('postagens.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breeds = Breed::orderBy('id')->get();
        return view('postagens.create', compact('breeds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:100|min:2',
            'breed' => 'required',
            'peso' => 'required',
            'descricao' => 'required|max:600|min:50',
            'foto' => 'required',
        ];

        $msgs = [
            "required" => "Campo obrigatório!",
            "max" => "Tamanho máximo de [:max] caracteres!",
            "min" => "Tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras,$msgs);

        if($request->hasFile('foto')){
            $post = new Postagem();
            $post->nome = $request->nome;
            $post->breed_id = $request->breed;
            $post->peso = $request->peso;
            $post->descricao = $request->descricao;
            $post->save();

            $id = $post->id;
            $extensao_arq = $request->file('foto')->getClientOriginalExtension();
            $nome_arq = $id.'_'.time().'.'.$extensao_arq;
            $request->file('foto')->storeAs("public/$this->path", $nome_arq);
            $post->foto = $this->path."/".$nome_arq;
            $post->save();
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Postagem::find($id);
        $breeds = Breed::orderBy('id')->get();
        return view('postagens.edit',compact('dados','breeds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:100|min:2',
            'breed' => 'required',
            'peso' => 'required',
            'descricao' => 'required|max:600|min:50',
        ];

        $msgs = [
            "required" => "Campo obrigatório!",
            "max" => "Tamanho máximo de [:max] caracteres!",
            "min" => "Tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras,$msgs);

        if($request->hasFile('foto')){
            $post = Postagem::find($id);
            $post->nome = $request->nome;
            $post->breed_id = $request->breed;
            $post->peso = $request->peso;
            $post->descricao = $request->descricao;
            $post->save();

            $id = $post->id;
            $extensao_arq = $request->file('foto')->getClientOriginalExtension();
            $nome_arq = $id.'_'.time().'.'.$extensao_arq;
            $request->file('foto')->storeAs("public/$this->path", $nome_arq);
            $post->foto = $this->path."/".$nome_arq;
            $post->save();
        }else{
            $post = Postagem::find($id);
            $post->nome = $request->nome;
            $post->breed_id = $request->breed;
            $post->peso = $request->peso;
            $post->descricao = $request->descricao;
            $post->save();
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Postagem::find($id);
        if(isset($post)){
            $post->destroy($id);
        }
        return redirect('/');
    }
}

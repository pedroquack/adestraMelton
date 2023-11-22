<?php

namespace App\Http\Controllers;
use App\Models\Postagem;
use App\Models\Breed;
use Illuminate\Http\Request;
use App\Facades\UserPermissions;

class PostagemController extends Controller
{   
    private $path = "fotos/postagens";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->authorizeResource(Postagem::class, 'postagem');
    }

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
        $breeds = Breed::orderBy('breed')->get();
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
        $obj_breed = Breed::find($request->breed);
        if(isset($obj_breed)){
            if($request->hasFile('foto')){
                $post = new Postagem();
                $post->nome = $request->nome;
                $post->breed_id = $request->breed;
                $post->breed()->associate($obj_breed);
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
        }
        return redirect('/#clientes');
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
    public function edit(Postagem $postagem)
    {
        $breeds = Breed::orderBy('breed')->get();
        return view('postagens.edit',compact('postagem','breeds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postagem $postagem)
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
        if(isset($postagem)){
            if($request->hasFile('foto')){
                $postagem->nome = $request->nome;
                $postagem->breed_id = $request->breed;
                $postagem->peso = $request->peso;
                $postagem->descricao = $request->descricao;
                $postagem->save();

                $id = $postagem->id;
                $extensao_arq = $request->file('foto')->getClientOriginalExtension();
                $nome_arq = $id.'_'.time().'.'.$extensao_arq;
                $request->file('foto')->storeAs("public/$this->path", $nome_arq);
                $postagem->foto = $this->path."/".$nome_arq;
                $postagem->save();
            }else{
                $postagem->nome = $request->nome;
                $postagem->breed_id = $request->breed;
                $postagem->peso = $request->peso;
                $postagem->descricao = $request->descricao;
                $postagem->save();
            }
        }
        return redirect('/#clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postagem $postagem)
    {
        if(isset($postagem)){
            $postagem->delete();
        }
        return redirect('/#clientes');
    }
}

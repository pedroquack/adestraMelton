<?php

namespace App\Http\Controllers;
use App\Models\Chamado;
use App\Models\Breed;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Chamado::orderBy('id')->get();
        $breeds = Breed::orderBy('id')->get();
        return view('chamados.index', compact('dados','breeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nomeTutor' => 'required|max:100|min:10',
            'telefone' => 'required|max:14|min:11',
            'nomeCachorro' => 'required|max:100|min:2',
            'breed' => 'required',
            'peso' => 'required',
            'idade' => 'required|max:15|min:3',
            'pessoas' => 'required',
            'animais' => 'required',
            'descricao' => 'required|max:2000|min:50',
        ];

        $msgs = [
            "required" => "Campo obrigatório!",
            "max" => "Tamanho máximo de [:max] caracteres!",
            "min" => "Tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras,$msgs);

        $chamado = new Chamado();
        $chamado->nomeTutor = $request->nomeTutor;
        $chamado->telefone = $request->telefone;
        $chamado->nomeCachorro = $request->nomeCachorro;
        $chamado->breed_id = $request->breed;
        $chamado->peso = $request->peso;
        $chamado->idade = $request->idade;
        $chamado->pessoas = $request->pessoas;
        $chamado->animais = $request->animais;
        $chamado->descricao = $request->descricao;
        $chamado->save();
           
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

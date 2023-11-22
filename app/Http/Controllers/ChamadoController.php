<?php

namespace App\Http\Controllers;
use App\Models\Chamado;
use App\Models\Breed;
use Illuminate\Http\Request;
use App\Facades\UserPermissions;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware(['auth'])->only('index');

    }

    public function index()
    {
        $this->authorize('viewAny', Chamado::class);
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

        $obj_breed = Breed::find($request->breed);
        if(isset($obj_breed)){
            $chamado = new Chamado();
            $chamado->nomeTutor = $request->nomeTutor;
            $chamado->telefone = $request->telefone;
            $chamado->nomeCachorro = $request->nomeCachorro;
            $chamado->breed_id = $request->breed;
            $chamado->breed()->associate($obj_breed);
            $chamado->peso = $request->peso;
            $chamado->idade = $request->idade;
            $chamado->pessoas = $request->pessoas;
            $chamado->animais = $request->animais;
            $chamado->descricao = $request->descricao;
            $chamado->save();
        }
        return redirect('/#contato');
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
    public function destroy(Chamado $chamado)
    {
        $this->authorize('delete', $chamado);
        if(isset($chamado)){
            $chamado->delete();
        }
        return redirect()->route('chamado.index');
    }
}

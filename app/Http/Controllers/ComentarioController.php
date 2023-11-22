<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\User;

class ComentarioController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Comentario::class, 'comentario');
    }
    public function index()
    {
        $this->authorize('viewAny', Comentario::class);
        $comentarios = Comentario::orderBy('id')->get();
        $data = array();
        $cont = 0;
        foreach($comentarios as $com){
            $data[$cont]['nota'] = $com->nota;
            $cont++;
        }
        $total_notas = array();
        $total_notas[0] = ['Notas', 'Qtde de Notas'];
        $cont = 1;
        foreach(array_count_values(array_column($data, 'nota')) as $key => $value){
            $total_notas[$cont] = [$key,$value];
            $cont++;
        }
        $total_notas = json_encode($total_notas);
        return view('comentarios.index', compact(['data', 'total_notas']));
    }

    public function store(Request $request)
    {
        $regras = [
            'comment' => 'required|max:5000|min:10',
            'ratings' => 'required|min:0',
        ];

        $msgs = [
            "required" => "Campos obrigatórios!",
            "max" => "Tamanho máximo de [:max] caracteres!",
            "min" => "Tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras,$msgs);
        $obj_user = User::find($request->user);
        if(isset($obj_user)){
            $comentario = new Comentario();
            $comentario->user_id = $request->user;
            $comentario->user()->associate($obj_user);
            $comentario->comment = $request->comment;
            $comentario->nota = $request->ratings;
            $comentario->save();
        }
        return redirect('/#comentarios');
    }
    public function destroy(Comentario $comentario)
    {
        if(isset($comentario)){
            $comentario->delete();
        }
        return redirect('/#comentarios');
    }
}

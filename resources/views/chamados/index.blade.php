@extends('template.main')
@section('conteudo')
<link rel="stylesheet" href="{{ URL::asset('css/chamados.css'); }} " type="text/css">
<div class="conteudo accordion accordion-flush m-5" id="accordionFlushExample">
    @foreach ($dados as $chamado)
    <div class="chamadoU mt-2 accordion-item d-flex flex-column justify-content-center align-items-center">
        <button class="botao-col accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#chamado{{$chamado->id}}" aria-expanded="false" aria-controls="flush-collapseOne">Chamado {{$chamado->id}}</button>
        <div class="chamado collapse" id="chamado{{$chamado->id}}" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="dados row">
                <div class="dadosTutor col-lg-6 col-12 d-flex flex-column">
                    <h2>Dados Tutor</h2>
                    <div class="dadosI">
                        <span>Nome:</span>
                        <p>{{$chamado->nomeTutor}}</p>
                    </div>
                    <div class="dadosI">
                        <span>Telefone:</span>
                        <p>{{$chamado->telefone}}</p>
                    </div>
                    <div class="dadosI">
                        <span>Pessoas:</span>
                        <p>{{$chamado->pessoas}}</p>
                    </div>
                    <div class="dadosI">
                        <span>Animais:</span>
                        <p>{{$chamado->animais}}</p>
                    </div>
                </div>
                <div class="dadosCachorro col-lg-6 col-12 d-flex flex-column">
                    <h2>Dados Cachorro</h2>
                    <div class="dadosI">
                        <span>Nome:</span>
                        <p>{{$chamado->nomeCachorro}}</p>
                    </div>
                    <div class="dadosI">
                        <span>Raça:</span>
                        <p>{{$breeds[$chamado->breed_id - 1]->breed}}</p>
                    </div>
                    <div class="dadosI">
                        <span>Peso:</span>
                        <p>{{$chamado->peso}}kg</p>
                    </div>
                    <div class="dadosI">
                        <span>Idade:</span>
                        <p>{{$chamado->idade}}</p>
                    </div>
                </div>
            </div>
            <div class="descricaoProblema">
                <div class="descricaoProb">
                    <span>Descrição do Problema</span>
                    <p>{{$chamado->descricao}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
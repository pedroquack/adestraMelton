@extends('template.main')
@section('conteudo')
    <link rel="stylesheet" href="{{ URL::asset('css/principal.css'); }} " type="text/css">
    <main class="main m-5 row d-flex justify-content-center align-items-center ">
        <div class="esquerdaMain col-lg-6 col-12">
            <h2>Olá, meu nome é</h2>
            <h1 class="nomeGiulia">Giulia Gomes de Mello</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, sint perferendis culpa aut animi amet ratione, accusantium recusandae consectetur quae nulla quisquam sequi id cum fugiat necessitatibus nesciunt quaerat reiciendis.</p>
        </div>
        <div class="direitaMain col-lg-6 col-12 d-flex flex-column justify-content-center align-items-center" >
            <figure>
                <img src="{{asset('img/simba.png')}}" alt="a" width="450px" height="450px">
            </figure>
        </div>
    </main>
    <section id="clientes" class="posts container d-flex flex-column align-items-center m-5">
        <h1 class="text-center">NOSSOS CLIENTES</h1>
        <a href="{{route('postagem.create')}}" class="botao">NOVO POST +</a>
        <div class="cards row justify-content-around">
            @foreach ($post as $item)
            <div class="card col-lg-3 col-12 mt-lg-3 mt-5">
                <img class="card-img-top" src="{{asset("storage/$item->foto");}}" alt="{{$item->nome}}.png">
                <div class="card-body text-lg-start text-center">
                <h5 class="card-title">{{$item->nome}}</h5>
                <div class="card-carac row d-flex justify-content-between">
                    <small class="col-lg-6 col-12">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#0a337b}</style><path d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/></svg>
                        {{$breed[$item->breed_id -1]->breed}}
                    </small>
                    <small class="col-lg-6 col-12">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#0f1724}</style><path d="M224 96a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm122.5 32c3.5-10 5.5-20.8 5.5-32c0-53-43-96-96-96s-96 43-96 96c0 11.2 1.9 22 5.5 32H120c-22 0-41.2 15-46.6 36.4l-72 288c-3.6 14.3-.4 29.5 8.7 41.2S33.2 512 48 512H464c14.8 0 28.7-6.8 37.8-18.5s12.3-26.8 8.7-41.2l-72-288C433.2 143 414 128 392 128H346.5z"/></svg>
                        {{$item->peso}}kg
                    </small>
                </div>
                    <p class="card-text">{{$item->descricao}}</p>
                </div>
                <div class="actions d-flex justify-content-around">
                    <a class="botao" href="{{route('postagem.edit', $item->id)}}">EDITAR</a>
                    <form action="{{route('postagem.destroy', $item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="botao" value="EXCLUIR">
                    </form>

                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="formulario m-5 container text-center">
        <form class="formChamado" action="{{route('chamado.store')}}" method="post">
            @csrf
            <h1 class="formTitle">ENTRE EM CONTATO</h1>
            <div class="formInputs row">
                <div class="pessoaInformacao d-flex flex-column col-lg-6 col-12">
                    <h2>Informações do tutor</h2>
                    <div class="inputs col-lg-6 col-12">
                        <input type="text" name="nomeTutor" id="nomeTutor" placeholder="Nome completo" class="@if($errors->has('nomeTutor')) is-invalid @endif" value="{{old('nomeTutor')}}"s>
                        @if($errors->has('nomeTutor'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('nomeTutor') }}
                            </div>
                        @endif
                    </div>
                    <div class="inputs">
                        <input type="tel" name="telefone" id="telefone" placeholder="Telefone" class="@if($errors->has('telefone')) is-invalid @endif" value="{{old('telefone')}}"s>
                        @if($errors->has('telefone'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('telefone') }}
                            </div>
                        @endif
                    </div>
                    <div class="inputs">
                        <input type="number" name="pessoas" id="pessoas" placeholder="Quantas pessoas tem na casa" class="@if($errors->has('pessoas')) is-invalid @endif" value="{{old('pessoas')}}" min="1" max="100">
                        @if($errors->has('pessoas'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('pessoas') }}
                            </div>
                        @endif
                    </div>
                    <div class="inputs">
                        <input type="number" name="animais" id="animais" placeholder="Quantos animais tem na casa" class="@if($errors->has('animais')) is-invalid @endif" value="{{old('animais')}}" min="1" max="100">
                        @if($errors->has('animais'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('animais') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="cachorroInformacao d-flex flex-column col-lg-6 col-12">
                    <h2>Informações do cão</h2>
                    <div class="inputs">
                        <input type="text" name="nomeCachorro" id="nomeCachorro" placeholder="Nome" class="@if($errors->has('nomeCachorro')) is-invalid @endif" value="{{old('nomeCachorro')}}">
                        @if($errors->has('nomeCachorro'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('nomeCachorro') }}
                            </div>
                        @endif
                    </div>
                    <div class="inputs">
                        <select name="breed" id="breed" class="@if($errors->has('breed')) is-invalid @endif" value="{{old('breed')}}">
                            <option class="raca1" value="" disabled selected>Raça</option>
                            @foreach ($breed as $raca)
                                <option value="{{$raca->id}}">{{$raca->breed}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('breed'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('breed') }}
                            </div>
                        @endif
                    </div>
                    <div class="inputs">
                        <input type="number" name="peso" id="peso" step="0.01" placeholder="Peso(kg)" class="@if($errors->has('peso')) is-invalid @endif" value="{{old('peso')}}" min="0" max="150">
                        @if($errors->has('peso'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('peso') }}
                            </div>
                        @endif
                    </div>
                    <div class="inputs">
                        <input type="text" name="idade" id="idade" placeholder="Idade" class="@if($errors->has('idade')) is-invalid @endif" value="{{old('idade')}}">
                        @if($errors->has('idade'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('idade') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="descricaoProb mt-3">
                    <div class="inputs">
                        <textarea name="descricao" id="descricao" placeholder="Descreva quais problemas você está enfrentando com seu cão" class="@if($errors->has('animais')) is-invalid @endif">{{old('descricao')}}</textarea>
                        @if($errors->has('descricao'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('descricao') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <input class="botaoForm" type="submit" value="ENVIAR">
        </form>
    </section>
@endsection


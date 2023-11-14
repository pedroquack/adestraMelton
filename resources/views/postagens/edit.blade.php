@extends('template.main')
@section('conteudo')
<link rel="stylesheet" href="{{ URL::asset('css/create.css'); }} " type="text/css">
<div class="principal container d-flex justify-content-center align-items-center">
    <form action="{{route('postagem.update', $dados->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="text-center">NOVA POSTAGEM</h1>
        <div class="inputs">
            <input type="text" name="nome" id="nome" placeholder="Nome" class="@if($errors->has('nome')) is-invalid @endif" value="{{$dados->nome}}">
            @if($errors->has('nome'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('nome') }}
                        </div>
            @endif
        </div>
        <div class="racapeso row">
            <div class="inputs col-lg-6 col-12">
                <select name="breed" id="breed" class="@if($errors->has('breed')) is-invalid @endif">
                    <option value="{{$dados->breed_id}}" select>{{$breeds[$dados->breed_id-1]->breed}}</option>
                    @foreach ($breeds as $item)
                        <option value="{{$item->id}}">{{$item->breed}}</option>
                    @endforeach
                </select>
                @if($errors->has('breed'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('breed') }}
                            </div>
                @endif
            </div>
            <div class="inputs col-lg-6 col-12">
                <input type="number" name="peso" id="peso" placeholder="Peso (kg)" class="@if($errors->has('peso')) is-invalid @endif" min=0 max=350 value="{{$dados->peso}}">
                @if($errors->has('peso'))
                            <div class='invalid-feedback'>
                                {{ $errors->first('peso') }}
                            </div>
                @endif
            </div>
        </div>
        <div class="inputs">
            <textarea name="descricao" id="descricao" class="@if($errors->has('peso')) is-invalid @endif" placeholder="Descrição">{{$dados->descricao}}</textarea>
            @if($errors->has('descricao'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('descricao') }}
                        </div>
            @endif
        </div>
        <div class="inputs">
            <div class="d-flex editFile">
                <input type="file" name="foto" id="foto" class="@if($errors->has('foto')) is-invalid @endif" value="">
                <div class="atual">
                    <legend>Foto atual</legend>
                    <img src="{{asset("storage/$dados->foto");}}" alt="Imagem Atual" width="150px" height="150px">
                </div>
            </div>
            @if($errors->has('foto'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('foto') }}
                        </div>
            @endif
        </div>
        
        <button type="submit" class="botao">Criar</button>
    </form>
</div>

<script>
</script>
@endsection
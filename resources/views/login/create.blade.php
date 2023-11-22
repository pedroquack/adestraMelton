@extends('template.main')
@section('conteudo')
<link rel="stylesheet" href="{{ URL::asset('css/auth.css'); }} " type="text/css">
<div>
    <form action="{{route('register')}}" method="POST" 
    class="formAuth d-flex flex-column gap-1">
        @csrf
        <h1>CRIAR CONTA</h1>
        <input type="text" name="name" id="name" placeholder="Nome" class="input @if($errors->has('name')) is-invalid @endif" value="{{old('name')}}">
        @if($errors->has('name'))
            <div class='invalid-feedback'>
                {{ $errors->first('name') }}
            </div>
        @endif
        <input type="email" name="email" id="email" placeholder="Email" class="input @if($errors->has('email')) is-invalid @endif" value="{{old('email')}}">
        @if($errors->has('email'))
            <div class='invalid-feedback'>
                {{ $errors->first('email') }}
            </div>
        @endif
        <input type="password" name="password" id="password" placeholder="Senha" class="input @if($errors->has('password')) is-invalid @endif">
        @if($errors->has('password'))
            <div class='invalid-feedback'>
                {{ $errors->first('password') }}
            </div>
        @endif
        <select name="role" id="" class="@if($errors->has('role')) is-invalid @endif" value="{{old('role')}}">
            <option value="" selected>Selecione um cargo</option>
            @foreach($roles as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        @if($errors->has('role'))
            <div class='invalid-feedback'>
                {{ $errors->first('role') }}
            </div>
        @endif
        <input type="submit" value="CADASTRAR" class="botao">
    </form>
</div>
@endsection
@extends('template.main')
@section('conteudo')
<link rel="stylesheet" href="{{ URL::asset('css/auth.css'); }} " type="text/css">
<div>
    <form action="{{route('login')}}" method="POST" 
    class="formAuth d-flex flex-column gap-1">
        @csrf
        <h1>LOGIN</h1>
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
        <div class="remember d-flex justify-content-between">
            <label for="remember">Lembrar-me</label>
            <input type="checkbox" name="remember" class="remInput"> 
        </div>
        <input type="submit" value="ENTRAR" class="botao">
    </form>
</div>
@endsection
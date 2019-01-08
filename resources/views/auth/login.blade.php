@extends('shared.template-guest')

@section('content')

<form class="sign-box" name="frm_login" action="{{ url('/login') }}" method="post">
    @csrf

    <div class="sign-avatar">
        <img src="img/avatar-sign.png" alt="">
    </div>

    <header class="sign-title">{{ config('app.name') }} <small>Login</small></header>

    @if ($errors->has('email'))
        <div class="alert alert-danger alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{ $errors->first('email') }}</strong>
        </div>
    @endif

    @if ($errors->has('password'))
        <div class="alert alert-danger alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{ $errors->first('password') }}</strong>
        </div>
    @endif

    <div class="form-group">
        <input name="email" type="text" class="form-control {{ $errors->has('email') || $errors->has('password') ? 'form-control-danger' : '' }}" placeholder="E-mail" required>
    </div>

    <div class="form-group">
        <input name="password" type="password" class="form-control {{ $errors->has('email') || $errors->has('password') ? 'form-control-danger' : '' }}" placeholder="Senha" required>
    </div>

    <div class="form-group">
        <div class="checkbox float-left">
            <input type="checkbox" id="signed-in" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="signed-in">Lembrar-me</label>
        </div>
        <!--
        <div class="float-right reset">
            <a href="{{ url('password/reset') }}">Recuperar Senha</a>
        </div>
        -->
    </div>

    <button type="submit" class="btn btn-rounded">Entrar</button>
    <p class="sign-note">Não tem cadastro? <a href="{{ url('/register') }}">Cadastre-se já!</a></p>

</form>

@endsection
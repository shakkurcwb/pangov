@extends('shared.template-guest')

@section('content')

<form class="sign-box" name="frm_register" action="{{ url('/register') }}" method="post">
    @csrf

    <div class="sign-avatar no-photo">&plus;</div>

    <header class="sign-title">{{ config('app.name') }} <small>Novo Usuário</small></header>

    <div class="form-group">
        <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}" placeholder="Nome" value="{{ old('name') }}" required>
    </div>

    @if ($errors->has('name'))
        <div class="alert alert-danger alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{ $errors->first('name') }}</strong>
        </div>
    @endif
    
    <div class="form-group">
        <input name="email" type="text" class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}" placeholder="E-mail" value="{{ old('email') }}" required>
    </div>

    @if ($errors->has('email'))
        <div class="alert alert-danger alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{ $errors->first('email') }}</strong>
        </div>
    @endif

    <div class="form-group">
        <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'form-control-danger' : '' }}" placeholder="Senha">
    </div>

    @if ($errors->has('password'))
        <div class="alert alert-danger alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{ $errors->first('password') }}</strong>
        </div>
    @endif

    <div class="form-group">
        <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password') ? 'form-control-danger' : '' }}" placeholder="Confirmar Senha" required>
    </div>

    <button type="submit" class="btn btn-rounded">Criar</button>
    <p class="sign-note">Já possuí cadastro? <a href="{{ url('/login') }}">Acesse já!</a></p>

</form>

@endsection
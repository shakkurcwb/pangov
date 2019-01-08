@extends('shared.template-auth')

@section('stylesheets')

<link rel="stylesheet" href="{{ asset('css/separate/pages/user.min.css') }}">

@endsection

@section('content-header')

<div class="container-fluid">

    <form name="frm_search" action="{{ url('/contacts/search') }}" method="post">
        @csrf

        <div class="tbl">
            <div class="tbl-row">

                <div class="tbl-cell">
                    <h4>Usuários</h4>
                </div>
                <div class="tbl-cell tbl-cell">
                    <input type="text" class="form-control" name="search" placeholder="Procurar" value="{{ request('search') }}" size="10">
                </div>
                <div class="tbl-cell tbl-cell-action">
                    <button type="submit" class="btn btn-inline btn-primary">
                        <i class="font-icon font-icon-search"></i>
                    </button>
                </div>
                <div class="tbl-cell tbl-cell-action">
                    <!--
                    <a href="{{ url('/contacts/new') }}" class="btn btn-inline btn-primary">
                        <i class="font-icon font-icon-plus"></i>
                    </a>
                    -->
                </div>

            </div>
        </div>

    </form>
    
</div>

@endsection


@section('content')

<div class="container-fluid">

    @if (count($users) > 0)

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cadastro</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($users as $user)

                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                </tr>

            @endforeach

            </tbody>
        </table>

        {{ $users->links() }}

    @endif

</div>

@endsection

@section('scripts')

@endsection
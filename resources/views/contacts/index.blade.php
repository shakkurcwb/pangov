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
                    <h4>Meus Contatos</h4>
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
                    <a href="{{ url('/contacts/new') }}" class="btn btn-inline btn-primary">
                        <i class="font-icon font-icon-plus"></i>
                    </a>
                </div>

            </div>
        </div>

    </form>
    
</div>

@endsection

@section('content')

<div class="container-fluid">

    @if (session('status'))

        @alert([ 'class' => 'aquamarine' ])
            <strong>{{ session('status') }}</strong>
        @endalert

    @endif

    @if (count($contacts) > 0)

        <div class="row card-user-grid">

        @foreach ($contacts as $contact)

            <div class="col-sm-6 col-md-4 col-xl-3">
                <article class="card-user box-typical">

                    <a href="{{ url('/contacts/' . $contact->id . '/favorite') }}" class="card-user-action float-left">
                        
                        @if ($contact->is_favorite)
                            <i class="font-icon fa fa-star"></i>
                        @else
                            <i class="font-icon fa fa-star-o"></i>
                        @endif

                    </a>

                    <div class="card-user-action float-right">
                        <div class="dropdown dropdown-user-menu">

                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="font-icon glyphicon glyphicon-option-vertical"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('/contacts/' . $contact->id) }}">
                                    <i class="font-icon fa fa-binoculars"></i> Detalhes
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/contacts/' . $contact->id . '/edit') }}">
                                    <i class="font-icon fa fa-pencil-square-o"></i> Editar
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="card-user-photo">
                        <img src="{{ asset('img/avatar-2-128.png') }}" alt="">
                    </div>

                    <div class="card-user-name">{{ $contact->name }}</div>

                    @if (!empty($contact->position) || !empty($contact->company))

                        <div class="card-user-status">
                            {{ !empty($contact->position) ? $contact->position : '' }}
                            <br>
                            {{ !empty($contact->company) ? $contact->company : '' }}
                        </div>

                    @endif

                    @if (!empty($contact->phone))

                        <a href="tel:{{ str_replace(' ', '', $contact->phone) }}" target="_blank" class="btn btn-rounded btn-sm btn-info">
                            <span class="font-icon glyphicon glyphicon-earphone"></span>
                        </a>

                    @endif

                    @if (!empty($contact->email))

                        <a href="mailto:{{ $contact->email }}" target="_blank" class="btn btn-rounded btn-sm btn-info">
                            <span class="font-icon glyphicon glyphicon-envelope"></span>
                        </a>

                    @endif
                    
                    <div class="card-user-social">

                        @if (!empty($contact->whatsapp))

                            <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', $contact->whatsapp) }}" target="_blank">
                                <i class="font-icon fa fa-whatsapp"></i>
                            </a>

                        @endif

                        @if (!empty($contact->facebook))

                            <a href="https://fb.com/{{ $contact->facebook }}" target="_blank">
                                <i class="font-icon fa fa-facebook"></i>
                            </a>

                        @endif

                        @if (!empty($contact->instagram))

                            <a href="https://instagram.com/{{ $contact->instagram }}" target="_blank">
                                <i class="font-icon fa fa-instagram"></i>
                            </a>

                        @endif

                        @if (!empty($contact->twitter))

                            <a href="https://twitter.com/{{ $contact->twitter }}" target="_blank">
                                <i class="font-icon fa fa-twitter"></i>
                            </a>

                        @endif
                        
                        @if (!empty($contact->linkedin))

                            <a href="https://linkedin.com/in/{{ $contact->linkedin }}" target="_blank">
                                <i class="font-icon fa fa-linkedin"></i>
                            </a>

                        @endif

                    </div>

                </article>
            </div>

        @endforeach

        </div>

        {{ $contacts->links() }}

    @else

        @info([ 'class' => 'info' ])
            <strong>Nenhum contato encontrado.</strong>
            <br>
            <p>Crie um novo contato para começar a popular sua agenda pessoal.</p>
            <br>
            <small>Em caso de dúvidas, consulte nosso <a href="{{ url('/help') }}">manual</a>.</small>
        @endinfo

    @endif

</div>

@endsection

@section('scripts')

@endsection
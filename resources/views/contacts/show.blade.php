@extends('shared.template-auth')

@section('stylesheets')

<link rel="stylesheet" href="{{ asset('css/separate/pages/profile.min.css') }}">

@endsection

@section('content-header')

<div class="container-fluid">

    <div class="tbl">
        <div class="tbl-row">

            <div class="tbl-cell">
                <h4>{{ $contact->name }}</h4>
            </div>
            <div class="tbl-cell tbl-cell-action">

                @if (Auth::id() == $contact->created_by)

                    <a href="{{ url('/contacts/' . $contact->id . '/edit') }}" class="btn btn-inline btn-primary">
                        <i class="font-icon fa fa-pencil-square-o"></i> Editar
                    </a>
                    <a href="{{ url('/contacts') }}" class="btn btn-inline btn-secondary">
                        <i class="font-icon font-icon-arrow-left"></i>
                    </a>

                @else

                    <a href="{{ url('/contacts/' . $contact->id . '/add') }}" class="btn btn-inline btn-info">
                        <i class="font-icon fa fa-feed"></i> Adicionar
                    </a>
                
                @endif

            </div>

        </div>
    </div>
    
</div>

@endsection


@section('content')

<div class="container-fluid">
    
    <div class="row">
        
        <div class="col-lg-3 col-lg-pull-6 col-md-6 col-sm-6">

            <section class="box-typical">

                <div class="profile-card">

                    <div class="profile-card-photo">
                        <img src="{{ asset('img/avatar-2-128.png') }}" alt=""/>
                    </div>
                    <div class="profile-card-name">{{ $contact->name }}</div>

                    @if (!empty($contact->position))
                        <div class="profile-card-status">{{ $contact->position }}</div>
                    @endif

                    @if (!empty($contact->company))
                        <div class="profile-card-status">{{ $contact->company }}</div>
                    @endif

                    @if (!empty($contact->number))

                        <div class="btn-group">
                            <a href="tel:{{ str_replace(' ', '', $contact->number) }}" target="_blank" class="btn btn-rounded btn-sm btn-info">
                                <span class="font-icon glyphicon glyphicon-earphone"></span>
                            </a>
                        </div>

                    @endif

                    @if (!empty($contact->email))

                        <div class="btn-group">
                            <a href="mailto:{{ $contact->email }}" target="_blank" class="btn btn-rounded btn-sm btn-info">
                                <span class="font-icon glyphicon glyphicon-envelope"></span>
                            </a>
                        </div>

                    @endif

                </div>

            </section>

        </div>

        <div class="col-lg-6 col-lg-push-3 col-md-12">

            <section class="box-typical">

                <header class="box-typical-header-sm">Detalhes</header>

                <article class="profile-info-item">
                    <ul class="exp-timeline">

                        <li class="exp-timeline-item">
                            <div class="dot"></div>
                            <div class="tbl">
                                <div class="tbl-row">

                                    <div class="tbl-cell">
                                        <div class="exp-timeline-range">Criado Em</div>
                                        <div class="exp-timeline-status">{{ $contact->created_at->format('d/m/Y H:i') }}</div>
                                    </div>

                                </div>
                            </div>
                        </li>

                        <li class="exp-timeline-item">
                            <div class="dot"></div>
                            <div class="tbl">
                                <div class="tbl-row">

                                    <div class="tbl-cell">
                                        <div class="exp-timeline-range">Alterado Em</div>
                                        <div class="exp-timeline-status">{{ $contact->updated_at->format('d/m/Y H:i') }}</div>
                                    </div>

                                </div>
                            </div>
                        </li>

                    </ul>
                </article>

            </section>

        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">

            @if (!empty($contact->whatsapp) || !empty($contact->facebook) || !empty($contact->instagram) || !empty($contact->twitter) || !empty($contact->linkedin))

                <section class="box-typical">

                    <header class="box-typical-header-sm">Redes Sociais</header>

                    <ul class="profile-links-list">

                        @if (!empty($contact->whatsapp))

                            <li class="nowrap">
                                <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', $contact->whatsapp) }}" target="_blank">
                                    <i class="font-icon fa fa-whatsapp"></i> WhatsApp
                                </a>
                            </li>

                        @endif
                        
                        @if (!empty($contact->facebook))

                            <li class="nowrap">
                                <a href="https://fb.com/{{ $contact->facebook }}" target="_blank">
                                    <i class="font-icon fa fa-facebook"></i> Facebook
                                </a>
                            </li>

                        @endif

                        @if (!empty($contact->instagram))

                            <li class="nowrap">
                                <a href="https://instagram.com/{{ $contact->instagram }}" target="_blank">
                                    <i class="font-icon fa fa-instagram"></i> Instagram
                                </a>
                            </li>

                        @endif

                        @if (!empty($contact->twitter))

                            <li class="nowrap">
                                <a href="https://twitter.com/{{ $contact->twitter }}" target="_blank">
                                    <i class="font-icon fa fa-twitter"></i> Twitter
                                </a>
                            </li>

                        @endif

                        @if (!empty($contact->linkedin))

                            <li class="nowrap">
                                <a href="https://linkedin.com/in/{{ $contact->linkedin }}" target="_blank">
                                    <i class="font-icon fa fa-linkedin"></i> LinkedIn
                                </a>
                            </li>

                        @endif

                    </ul>

                </section>

            @endif

            <section class="box-typical">

                <header class="box-typical-header-sm">Criador</header>

                    <div class="friends-list stripped">
                        <article class="friends-list-item">

                            <div class="user-card-row">
                                <div class="tbl-row">

                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="{{ asset('img/avatar-1-64.png') }}" alt="">
                                        </a>
                                    </div>

                                    <div class="tbl-cell">
                                        <p class="user-card-row-name {{ rand() % 2 ? 'status-online' : '' }}">
                                            {{ $contact->creator->name }}
                                        </p>
                                        <p class="user-card-row-status">
                                            <a href="mailto:{{ $contact->creator->email }}">
                                                E-mail
                                            </a>
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </article>
                    </div>

            </section>

        </div>

    </div>

</div>

@endsection

@section('scripts')

@endsection
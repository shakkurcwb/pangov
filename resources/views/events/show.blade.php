@extends('shared.template-auth')

@section('stylesheets')

<link rel="stylesheet" href="{{ asset('css/separate/pages/profile.min.css') }}">

@endsection

@section('content-header')

<div class="container-fluid">

    <div class="tbl">
        <div class="tbl-row">

            <div class="tbl-cell">
                <h4>{{ $event->title }}</h4>
            </div>
            <div class="tbl-cell tbl-cell-action">

                @if (Auth::id() == $event->created_by)

                    <a href="{{ url('/events/' . $event->id . '/edit') }}" class="btn btn-inline btn-primary">
                        <i class="font-icon fa fa-pencil-square-o"></i> Editar
                    </a>
                    <a href="{{ url('/events') }}" class="btn btn-inline btn-secondary">
                        <i class="font-icon font-icon-arrow-left"></i>
                    </a>

                @else

                    @if (!$event->is_private && !Auth::user()->isParticipating($event->id))

                        <a href="{{ url('/events/' . $event->id . '/join') }}" class="btn btn-inline btn-info">
                            <i class="font-icon fa fa-feed"></i> Participar
                        </a>

                    @elseif (!$event->is_private && Auth::user()->isParticipating($event->id))

                        <a href="{{ url('/events/' . $event->id . '/join') }}" class="btn btn-inline btn-warning">
                            <i class="font-icon fa fa-power-off"></i> Sair do Evento
                        </a>

                    @endif
                
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

                    @if ($event->start <= now() && $event->end >= now())

                        <div class="label label-warning">Em Andamento</div> 

                    @elseif ($event->start < now() && $event->end < now())

                        <div class="label label-danger">Encerrado</div>

                    @else

                        @if ($event->start->format('Y-m-d') == today()->format('Y-m-d'))

                            <div class="label label-success">A Iniciar</div>

                        @else

                            <div class="label label-secondary">Agendado</div>

                        @endif                                        

                    @endif

                    <div class="m-b-md m-t-md">
                        <img class="img-thumbnail" src="{{ asset('img/gall-img-4.jpg') }}" alt=""/>
                    </div>
                    <div class="profile-card-name">{{ $event->title }}</div>

                    @if (!empty($event->location))
                        <div class="profile-card-status">{{ $event->location }}</div>
                    @endif

                    @if (!empty($event->website))

                        <div class="btn-group">
                            <a href="{{ $event->website }}" target="_blank" class="btn btn-rounded btn-sm btn-info">
                                <span class="font-icon glyphicon glyphicon-globe"></span>
                            </a>
                        </div>

                    @endif

                </div>

            </section>

        </div>

        <div class="col-lg-6 col-lg-push-3 col-md-12">

            <section class="box-typical">

                <header class="box-typical-header-sm">Informações</header>

                <article class="profile-info-item">

                    <header class="profile-info-item-header">
                        <i class="font-icon font-icon-quote"></i>
                        Descrição
                    </header>
                    <div class="text-block text-block-typical">
                        <p class="color-blue-grey">{{ !empty($event->description) ? $event->description : 'Não há descrição para este evento.' }}</p>
                    </div>

                    <header class="profile-info-item-header">
                        <i class="font-icon font-icon-calend"></i>
                        Data e Hora
                    </header>
                    <ul class="exp-timeline">

                        <li class="exp-timeline-item">
                            <div class="dot"></div>
                            <div class="tbl">
                                <div class="tbl-row">

                                    <div class="tbl-cell">
                                        <div class="exp-timeline-range">Início</div>
                                        <div class="exp-timeline-status color-blue-grey">{{ $event->start->format('d/m/Y H:i') }}</div>
                                    </div>

                                </div>
                            </div>
                        </li>

                        <li class="exp-timeline-item">
                            <div class="dot"></div>
                            <div class="tbl">
                                <div class="tbl-row">

                                    <div class="tbl-cell">
                                        <div class="exp-timeline-range">Encerramento</div>
                                        <div class="exp-timeline-status color-blue-grey">{{ $event->end->format('d/m/Y H:i') }}</div>
                                    </div>

                                </div>
                            </div>
                        </li>

                    </ul>

                    <header class="profile-info-item-header">
                        <i class="font-icon font-icon-bookmark"></i>
                        Categorias
                    </header>

                    @if (count($keywords) > 0)
                
                        <div class="profile-interests">

                        @foreach ($keywords as $keyword)

                            <span class="label label-light-grey">{{ $keyword }}</span>

                        @endforeach

                        </div>

                    @else

                        <div class="text-block text-block-typical">
                            <p class="color-blue-grey">Não há categorias cadastradas.</p>
                        </div>

                    @endif

                </article>

            </section>

        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">

            <section class="box-typical">

                <header class="box-typical-header-sm">Participantes</header>

                @if ($event->is_private)

                    <div class="see-all color-red">
                        <span class="font-icon glyphicon glyphicon-lock"></span>
                        Evento Privado
                    </div>
                    <div class="see-all color-blue-grey">
                        <small>Não permite participantes.</small>
                    </div>

                @else

                    @if (count($event->members) > 0)

                        <div class="friends-list stripped">
                            <article class="friends-list-item">

                                @foreach ($event->members as $member)

                                    <div class="user-card-row">
                                        <div class="tbl-row">

                                            <div class="tbl-cell tbl-cell-photo">
                                                <a href="#">
                                                    <img src="{{ asset('img/avatar-1-64.png') }}" alt="">
                                                </a>
                                            </div>

                                            <div class="tbl-cell">
                                                <p class="user-card-row-name {{ rand() % 2 ? 'status-online' : '' }}">
                                                    {{ $member->name }}
                                                </p>
                                                <p class="user-card-row-status">
                                                    <a target="_blank" href="mailto:{{ $member->email }}">
                                                        E-mail
                                                    </a>
                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                @endforeach
                            
                            </article>
                        </div>

                    @else

                        <div class="see-all color-blue-grey">
                            <small>Não há participantes.</small>
                        </div>

                    @endif

                @endif

            </section>

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
                                        {{ $event->creator->name }}
                                    </p>
                                    <p class="user-card-row-status">
                                        <a target="_blank" href="mailto:{{ $event->creator->email }}">
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
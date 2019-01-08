@extends('shared.template-auth')

@section('stylesheets')

@endsection

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-sm-3">

            <article class="statistic-box red">
                <div>
                    <div class="number">{{ $contacts ? $contacts : '0' }}</div>
                    <div class="caption"><div>Contatos <small>=</small></div></div>
                </div>
            </article>

        </div>

        <div class="col-sm-3">

            <article class="statistic-box purple">
                <div>
                    <div class="number">{{ $events }}</div>
                    <div class="caption"><div>Eventos <small>=</small></div></div>
                </div>
            </article>
            
        </div>

        <div class="col-sm-3">

            <article class="statistic-box green">
                <div>
                    <div class="number">{{ $events_today }}</div>
                    <div class="caption"><div>Eventos <small>hoje</small></div></div>
                </div>
            </article>

        </div>

        <div class="col-sm-3">

            <article class="statistic-box yellow">
                <div>
                    <div class="number">{{ $events_week }}</div>
                    <div class="caption"><div>Eventos <small>semana</small></div></div>
                </div>
            </article>

        </div>

    </div>

    <div class="row">

        <div class="col-xl-6 dashboard-column">
            
            @if (count($favorites) > 0)

                <section class="box-typical box-typical-dashboard panel panel-default scrollable">

                    <header class="box-typical-header panel-heading">
                        <h3 class="panel-title">Meus Contatos Favoritos</h3>
                    </header>

                    <div class="box-typical-body panel-body">

                        <table class="tbl-typical">
                            <tr>
                                <th><div>Nome</div></th>
                                <th align="center"><div>#</div></th>
                            </tr>

                            @foreach ($favorites as $contact)

                                <tr>
                                    <td>
                                        <a href="{{ url('/contacts/' . $contact->id) }}">{{ $contact->name }}</a>
                                    </td>
                                    <td align="center">

                                        @if (!empty($contact->phone))

                                            <a href="tel:{{ str_replace(' ', '', $contact->phone) }}" target="_blank" class="label">
                                                <span class="font-icon glyphicon glyphicon-earphone"></span>
                                            </a>

                                        @endif

                                        @if (!empty($contact->email))

                                            <a href="mailto:{{ $contact->email }}" target="_blank" class="label">
                                                <span class="font-icon glyphicon glyphicon-envelope"></span>
                                            </a>

                                        @endif

                                        @if (!empty($contact->whatsapp))

                                            <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', $contact->whatsapp) }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-whatsapp"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->facebook))

                                            <a href="https://fb.com/{{ $contact->facebook }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-facebook"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->instagram))

                                            <a href="https://instagram.com/{{ $contact->instagram }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-instagram"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->twitter))

                                            <a href="https://twitter.com/{{ $contact->twitter }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-twitter"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->linkedin))

                                            <a href="https://linkedin.com/in/{{ $contact->linkedin }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-linkedin"></i>
                                            </a>

                                        @endif

                                    </td>
                                </tr>

                            @endforeach

                        </table>

                    </div>
        
                </section>

            @endif

            @if (count($recent_contacts) > 0)

                <section class="box-typical box-typical-dashboard panel panel-default scrollable">

                    <header class="box-typical-header panel-heading">
                        <h3 class="panel-title">Meus Contatos Recentes</h3>
                    </header>

                    <div class="box-typical-body panel-body">

                        <table class="tbl-typical">
                            <tr>
                                <th><div>Nome</div></th>
                                <th align="center"><div>#</div></th>
                            </tr>

                            @foreach ($recent_contacts as $contact)

                                <tr>
                                    <td>
                                        <a href="{{ url('/contacts/' . $contact->id) }}">{{ $contact->name }}</a>
                                    </td>
                                    <td align="center">

                                        @if (!empty($contact->phone))

                                            <a href="tel:{{ str_replace(' ', '', $contact->phone) }}" target="_blank" class="label">
                                                <span class="font-icon glyphicon glyphicon-earphone"></span>
                                            </a>

                                        @endif

                                        @if (!empty($contact->email))

                                            <a href="mailto:{{ $contact->email }}" target="_blank" class="label">
                                                <span class="font-icon glyphicon glyphicon-envelope"></span>
                                            </a>

                                        @endif

                                        @if (!empty($contact->whatsapp))

                                            <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', $contact->whatsapp) }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-whatsapp"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->facebook))

                                            <a href="https://fb.com/{{ $contact->facebook }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-facebook"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->instagram))

                                            <a href="https://instagram.com/{{ $contact->instagram }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-instagram"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->twitter))

                                            <a href="https://twitter.com/{{ $contact->twitter }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-twitter"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->linkedin))

                                            <a href="https://linkedin.com/in/{{ $contact->linkedin }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-linkedin"></i>
                                            </a>

                                        @endif

                                    </td>
                                </tr>

                            @endforeach

                        </table>

                    </div>

                </section>

            @endif

            @if ($contacts == 0)

                @info([ 'class' => 'info' ])
                    <strong>Você ainda não tem contatos.</strong>
                    <br>
                    <small>Crie novos contatos para visualizar seu painel personalizado. Clique <a href="{{ url('/contacts/new') }}">aqui</a>.</small>
                @endinfo

            @endif

            @if (count($public_contacts) > 0)

                <section class="box-typical box-typical-dashboard panel panel-default scrollable">

                    <header class="box-typical-header panel-heading">
                        <h3 class="panel-title">Explorar <small>encontre novas conexões</small></h3>                        
                    </header>

                    <div class="box-typical-body panel-body">

                        <table class="tbl-typical">
                            <tr>
                                <th><div>Nome</div></th>
                                <th align="center"><div>#</div></th>
                            </tr>

                            @foreach ($public_contacts as $contact)

                                <tr>
                                    <td>
                                        <a href="{{ url('/contacts/' . $contact->id) }}">{{ $contact->name }}</a>
                                    </td>
                                    <td align="center">

                                        @if (!empty($contact->phone))

                                            <a href="tel:{{ str_replace(' ', '', $contact->phone) }}" target="_blank" class="label">
                                                <span class="font-icon glyphicon glyphicon-earphone"></span>
                                            </a>

                                        @endif

                                        @if (!empty($contact->email))

                                            <a href="mailto:{{ $contact->email }}" target="_blank" class="label">
                                                <span class="font-icon glyphicon glyphicon-envelope"></span>
                                            </a>

                                        @endif

                                        @if (!empty($contact->whatsapp))

                                            <a href="https://api.whatsapp.com/send?phone={{ str_replace(' ', '', $contact->whatsapp) }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-whatsapp"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->facebook))

                                            <a href="https://fb.com/{{ $contact->facebook }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-facebook"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->instagram))

                                            <a href="https://instagram.com/{{ $contact->instagram }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-instagram"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->twitter))

                                            <a href="https://twitter.com/{{ $contact->twitter }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-twitter"></i>
                                            </a>

                                        @endif

                                        @if (!empty($contact->linkedin))

                                            <a href="https://linkedin.com/in/{{ $contact->linkedin }}" target="_blank" class="label">
                                                <i class="font-icon fa fa-linkedin"></i>
                                            </a>

                                        @endif

                                    </td>
                                </tr>

                            @endforeach

                        </table>

                    </div>

                </section>

            @endif

        </div>

        <div class="col-xl-6 dashboard-column">

            @if (count($recent_events) > 0)

                <section class="box-typical box-typical-dashboard panel panel-default scrollable">

                    <header class="box-typical-header panel-heading">
                        <h3 class="panel-title">Meus Eventos Recentes</h3>
                    </header>

                    <div class="box-typical-body panel-body">

                        <table class="tbl-typical">
                            <tr>
                                <th><div>Título</div></th>
                                <th><div>Criador</div></th>
                                <th align="center"><div>Membros</div></th>
                                <th align="center"><div>Status</div></th>
                            </tr>

                            @foreach ($recent_events as $event)

                                <tr>
                                    <td>
                                        <a href="{{ url('/events/' . $event->id) }}">{{ $event->title }}</a>
                                    </td>
                                    <td>
                                        @if ($event->creator->id == Auth::id())
                                            <a target="_blank" href="mailto:{{ $event->creator->email }}">{{ $event->creator->name }}</a>
                                        @else
                                            <span class="color-blue-grey">Você</span>
                                        @endif
                                    </td>
                                    <td align="center">{{ $event->members->count() }}</td>
                                    <td align="center">

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

                                    </td>
                                </tr>

                            @endforeach

                        </table>

                    </div>

                </section>

            @endif

            @if ($events == 0)

                @info([ 'class' => 'info' ])
                    <strong>Você ainda não tem eventos.</strong>
                    <br>
                    <small>Crie novos eventos para visualizar seu painel personalizado. Clique <a href="{{ url('/events/new') }}">aqui</a>.</small>
                @endinfo

            @endif

            @if (count($public_events) > 0)

                <section class="box-typical box-typical-dashboard panel panel-default scrollable">

                    <header class="box-typical-header panel-heading">
                        <h3 class="panel-title">Eventos Públicos <small>junte-se com propósito</small></h3>                        
                    </header>

                    <div class="box-typical-body panel-body">

                        <table class="tbl-typical">
                            <tr>
                                <th><div>Título</div></th>
                                <th><div>Criador</div></th>
                                <th align="center"><div>Membros</div></th>
                                <th align="center"><div>Status</div></th>
                            </tr>

                            @foreach ($public_events as $event)

                                <tr>
                                    <td>
                                        <a href="{{ url('/events/' . $event->id) }}">{{ $event->title }}</a>
                                    </td>
                                    <td>
                                        <a target="_blank" href="mailto:{{ $event->creator->email }}">{{ $event->creator->name }}</a>
                                    </td>
                                    <td align="center">{{ $event->members->count() }}</td>
                                    <td align="center">

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

                                    </td>
                                </tr>

                            @endforeach

                        </table>

                    </div>

                </section>

            @endif

        </div>

    </div>

</div>

@endsection

@section('scripts')

@endsection
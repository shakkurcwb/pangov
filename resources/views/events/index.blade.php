@extends('shared.template-auth')

@section('stylesheets')

<link rel="stylesheet" href="{{ asset('css/lib/fullcalendar/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/pages/calendar.min.css') }}">

@endsection

@section('content-header')

<div class="container-fluid">

    <form name="frm_search" action="{{ url('/events/search') }}" method="post">
        @csrf

        <div class="tbl">
            <div class="tbl-row">

                <div class="tbl-cell">
                    <h4>Meus Eventos</h4>
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
                    <a href="{{ url('/events/new') }}" class="btn btn-inline btn-primary">
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

    @if (count($events) > 0)

        <div class="box-typical">

            <div class="calendar-page">

                <div class="calendar-page-content">
                    <div class="calendar-page-content-in">
                        <div id='calendar'></div>
                    </div>
                </div>

                <div class="calendar-page-side">

                    <section class="calendar-page-side-section">

                        <header class="box-typical-header-sm">Próximos Eventos</header>
                        <div class="calendar-page-side-section-in">
                            <ul class="exp-timeline">

                                @if (count($next_events) > 0)

                                    @foreach ($next_events as $event)

                                        <li class="exp-timeline-item">
                                            <div class="dot"></div>
                                            <div class="">{{ $event->start->format('d/m/Y H:i') }}</div>
                                            <div class="color-black-blue">
                                                <a href="{{ url('/events/' . $event->id) }}">{{ $event->title }}</a>
                                            </div>
                                            
                                            @if (!empty($event->description))
                                                <div class="color-blue-grey text-truncate">{{ $event->description }}</div>
                                            @endif

                                            @if ($event->creator->id != Auth::id())
                                                <div class="label label-success">Participante</div>
                                            @else
                                                <div class="label label-warning">Organizador</div>
                                            @endif

                                        </li>

                                    @endforeach

                                @else

                                    <li class="exp-timeline-item">
                                        <div class="dot"></div>
                                        <div class="color-red">Não há eventos disponíveis!</div>                                     
                                        <div class="color-blue-grey">Crie ou participe de eventos.</div>
                                    </li>

                                @endif

                            </ul>
                        </div>

                    </section>

                </div>

            </div>

        </div>

    @else

        @info([ 'class' => 'info' ])
            <strong>Nenhum evento encontrado.</strong>
            <br>
            <p>Eventos servem para registrar atividades de seu cotidiano. Experimente já!</p>
            <br>
            <small>Em caso de dúvidas, consulte nosso <a href="{{ url('/help') }}">manual</a>.</small>
        @endinfo

    @endif

</div>

@endsection

@section('scripts')

<script src="{{ asset('js/lib/match-height/jquery.matchHeight.min.js') }}"></script>

<script src="{{ asset('js/lib/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/lib/fullcalendar/fullcalendar.min.js') }}"></script>

<script>
    var _user_id = {{ Auth::id() }};
    var _events = @json($events);
</script>

<script src="{{ asset('js/calendar.js') }}"></script>

@endsection
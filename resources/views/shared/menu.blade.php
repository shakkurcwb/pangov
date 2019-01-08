
<ul class="side-menu-list">

    <li class="red {{ Request::is('dashboard*') ? 'opened' : '' }}">
        <a href="{{ url('/dashboard') }}">
            <i class="font-icon font-icon-speed"></i>
            <span class="lbl">Dashboard</span>
        </a>
    </li>
    <li class="blue {{ Request::is('contacts*') ? 'opened' : '' }}">
        <a href="{{ url('/contacts') }}">
            <i class="fa fa-group"></i>
            <span class="lbl">Contatos</span>
        </a>
    </li>
    <li class="blue {{ Request::is('events*') ? 'opened' : '' }}">
        <a href="{{ url('/events') }}">
            <i class="fa fa-calendar-o"></i>
            <span class="lbl">Eventos</span>
        </a>
    </li>

</ul>
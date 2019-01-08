
<div class="container-fluid">

    <a href="{{ url('/') }}" class="site-logo">
        <img class="hidden-md-down" src="{{ asset('img/logo-2.png') }}" alt="">
        <img class="hidden-lg-down" src="{{ asset('img/logo-2-mob.png') }}" alt="">
    </a>

    <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
        <span>toggle menu</span>
    </button>

    <button class="hamburger hamburger-htla">
        <span>toggle menu</span>
    </button>

    <div class="site-header-content">
        <div class="site-header-content-in">

            <div class="site-header-shown">

                <div class="dropdown user-menu">
                    <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('img/avatar-2-64.png') }}" alt="">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                        <!--
                        <a class="dropdown-item" href="{{ url('/profile') }}">
                            <span class="font-icon glyphicon glyphicon-user"></span> Meu Perfil
                        </a>
                        <a class="dropdown-item" href="{{ url('/settings') }}">
                            <span class="font-icon glyphicon glyphicon-cog"></span> Configurações
                        </a>
                        <div class="dropdown-divider"></div>
                        -->
                        <a class="dropdown-item" href="{{ url('/help') }}">
                            <span class="font-icon glyphicon glyphicon-question-sign"></span> Ajuda
                        </a>
                        <!--
                        <a class="dropdown-item" href="{{ url('/feedback') }}">
                            <span class="font-icon glyphicon glyphicon-thumbs-up"></span> Feedback
                        </a>
                        -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <span class="font-icon glyphicon glyphicon-log-out"></span> Sair
                        </a>
                    </div>
                    <form name="frm_logout" id="frm-logout" action="{{ url('/logout') }}" method="post">
                        @csrf
                    </form>
                </div>

            </div>

        </div>
    </div>
    
</div>

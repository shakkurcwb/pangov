@extends('shared.template-auth')

@section('stylesheets')

@endsection

@section('content')

<div class="container-fluid">

    <div class="box-typical box-typical-padding">

        <header class="documentation-header">
            <h2>Precisa de Ajuda?</h2>
            <p class="lead color-blue-grey">Preparamos uma breve introdução para te ajudar a entender este sistema.</p>
        </header>

        <div class="text-block text-block-typical">
            <p>Este sistema foi construído utilizando <code>PHP</code>, <code>JavaScript</code>, <code>React</code>, <code>CSS3</code> e <code>SASS</code>.</p>
            <p>Foi desenvolvido com muito amor e carinho, resultando num trabalho de alta qualidade e de simples manutenibilidade.</p>
            <p>Esta é a primeira versão do sistema, e será melhorado conforme o feedback que vocês nos enviarem.</p>
            <p>Esperamos que este seja o início de um grande projeto, visando simplificar a vida de muitos brasileiros.</p>
            <!--
            <h4>Erros e Bugs</h4>
            <p>As vezes você poderá se deparar com erros ou bugs que te impedem de executar alguma ação.</p>
            <p>Sentimos muito por isso, e para possibilitar que possamos agir rápidamente nos problemas, criamos um <a href="{{ url('/feedback') }}">canal exclusivo</a>.</p>
            <p>Fique a vontade para enviar-nos quaisquer problemáticas que eventualmente apareçam em sua navegação.</p>
            <p>Faremos nosso melhor para evitar que isto volte a acontecer com você, e com todos os nossos usuários.</p>
            -->
            <h4>Contatos</h4>
            <p>Contatos servem para armazenar o registro pessoal/profissional de pessoas ou empresas.</p>
            <p>As funcionalidades presentes são amplamente conhecidas:
                <span class="label">criar</span>
                <span class="label">editar</span>
                <span class="label">excluir</span>
                <span class="label label-warning">favoritar</span>
                <span class="label label-danger">compartilhar</span>
            </p>
            <p>A interface simples e intuitiva lhe ajudará nos primeiros passo de criação de seus contatos.</p>
            <p>* <small>Em seu <a href="{{ url('/dashboard') }}">dashboard</a>, você poderá explorar os contatos de outros usuários, adicionando-os a sua agenda.</small></p>
            <h4>Eventos</h4>
            <p>Nada melhor do que registrar seus eventos e atividades de maneira simples e fácil</p>
            <p>Tenha o controle de cada evento, além de participar em eventos de outrens.</p>
            <p>As funcionalidades disponíveis são:
                <span class="label">criar</span>
                <span class="label">editar</span>
                <span class="label">excluir</span>
                <span class="label label-warning">participar</span>
                <span class="label label-danger">compartilhar</span>
            </p>
            <p>Os eventos permitem que você controle seu cronograma oficial, e até mesmo organize suas atividades pessoais.</p>
            <p>Eventos privados não aceitam participantes, por tal, somente você irá interagir com ele.</p>
            <p>Já os eventos públicos aceitam participantes, o que permite a outros usuários participar e ter acesso ao evento.</p>
            <p>* <small>Confere seu <a href="{{ url('/dashboard') }}">dashboard</a>, lá será exibidos os principais eventos públicos!</small></p>
        </div>

    </div>

</div>

@endsection

@section('scripts')

@endsection
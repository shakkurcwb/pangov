@extends('shared.template-auth')

@section('stylesheets')

@endsection

@section('content')

<div class="container-fluid">

    @if (session('status'))

        @alert([ 'class' => 'aquamarine' ])
            <strong>{{ session('status') }}</strong>
        @endalert

    @endif

    <form name="frm_feedback" action="{{ url('/feedback') }}" method="post">
        @csrf

        <div class="box-typical box-typical-padding">

            <header class="documentation-header">
                <h2>Nos Avalie!</h2>
                <p class="lead color-blue-grey">Nós adoramos sugestões e idéias, e aprendemos com as críticas e erros.</p>
            </header>

            <div class="text-block text-block-typical">
                <p>Gostariamos de obter sua avaliação quanto a sua experiência neste sistema.</p>
                <p>Fique a vontade para nos enviar qualquer mensagem que julgue pertinente, estaremos aqui para ver!</p>
            </div>

            <div class="row">

                <div class="col-sm-12">

                    <div class="checkbox-detailed">
                        <input type="radio" name="type" id="type-1" value="1" {{ old('type') == '1' || empty(old('type')) ? 'checked' : '' }}>
                        <label for="type-1">
                        <span class="checkbox-detailed-tbl">
                            <span class="checkbox-detailed-cell">
                                <span class="checkbox-detailed-title">Feedback</span>
                            </span>
                        </span>
                        </label>
                    </div>

                    <div class="checkbox-detailed">
                        <input type="radio" name="type" id="type-2" value="2" {{ old('type') == '2' ? 'checked' : '' }}>
                        <label for="type-2">
                        <span class="checkbox-detailed-tbl">
                            <span class="checkbox-detailed-cell">
                                <span class="checkbox-detailed-title">Contato</span>
                            </span>
                        </span>
                        </label>
                    </div>

                    <div class="checkbox-detailed">
                        <input type="radio" name="type" id="type-3" value="3" {{ old('type') == '3' ? 'checked' : '' }}>
                        <label for="type-3">
                        <span class="checkbox-detailed-tbl">
                            <span class="checkbox-detailed-cell">
                                <span class="checkbox-detailed-title">Erro/Bug</span>
                            </span>
                        </span>
                        </label>
                    </div>

                </div>

            </div>

            <div class="row m-t">

                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8">
                    <textarea rows="4" name="message" class="form-control" placeholder="Descreva aqui sua mensagem!"></textarea>
                </div>

            </div>

            <div class="row m-t">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-inline btn-primary">Enviar</button>
                </div>
            </div>

        </div>

    </form>

</div>

@endsection

@section('scripts')

@endsection
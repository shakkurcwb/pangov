@extends('shared.template-auth')

@section('stylesheets')

<link rel="stylesheet" href="{{ asset('css/lib/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/vendor/flatpickr.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/separate/vendor/tags_editor.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/lib/jquery-minicolors/jquery.minicolors.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/vendor/jquery.minicolors.min.css') }}">

@endsection

@section('content-header')

<div class="container-fluid">

    <div class="tbl">
        <div class="tbl-row">

            <div class="tbl-cell">
                <h4>Novo Evento</h4>
            </div>
            <div class="tbl-cell tbl-cell-action">
                <a href="{{ url('/events') }}" class="btn btn-inline btn-secondary">
                    <i class="font-icon font-icon-arrow-left"></i>
                </a>
            </div>

        </div>
    </div>
    
</div>

@endsection

@section('content')

<div class="container-fluid">

    <div class="box-typical box-typical-padding">

        <form name="frm_create" action="{{ url('/events') }}" method="post">
            @csrf

            <h5 class="m-t-lg with-border">Dados Principais</h5>

            <div class="row">
                <label class="col-sm-2 form-control-label">Título <font color="red">*</font></label>
                <div class="col-sm-10">
                    <div class="form-group input-group">
                        <input type="text"
                            class="form-control {{ $errors->has('title') ? 'form-control-danger' : '' }}"
                            name="title" placeholder="" value="{{ old('title') }}" required
                        />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="font-icon glyphicon glyphicon-font"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->has('title'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('title') }}</strong>
                @endalert

            @endif

            <div class="row">
                <label class="col-sm-2 form-control-label">Início <font color="red">*</font></label>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <input class="flatpickr flatpickr-input form-control {{ $errors->has('start') ? 'form-control-danger' : '' }}"
                            name="start" value="{{ old('start') }}" required
                        />
                    </div>
                </div>
                <label class="col-sm-2 form-control-label">Fim <font color="red">*</font></label>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <input class="flatpickr flatpickr-input form-control {{ $errors->has('end') ? 'form-control-danger' : '' }}"
                            name="end" value="{{ old('end') }}" required
                        />
                    </div>
                </div>
            </div>

            @if ($errors->has('start'))
                
                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('start') }}</strong>
                @endalert

            @endif

            @if ($errors->has('end'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('end') }}</strong>
                @endalert

            @endif

            <h5 class="m-t-lg with-border">Informações Adicionais</h5>

            <div class="row">
                <label class="col-sm-2 form-control-label">Descrição</label>
                <div class="col-sm-10">
                    <div class="form-group input-group">
                        <textarea rows="4" name="description"
                            class="form-control {{ $errors->has('description') ? 'form-control-danger' : '' }}"
                            placeholder="Descreva seu evento/atividade de forma simples!"
                        >{{ old('description') }}</textarea>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-align-justify"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->has('description'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('description') }}</strong>
                @endalert

            @endif

            <div class="row">
                <label class="col-sm-2 form-control-label">Local</label>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <input type="text"
                            class="form-control {{ $errors->has('location') ? 'form-control-danger' : '' }}"
                            name="location" placeholder="" value="{{ old('location') }}"
                        />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-map-marker"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <label class="col-sm-2 form-control-label">Website</label>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <input type="text"
                            class="form-control {{ $errors->has('website') ? 'form-control-danger' : '' }}"
                            name="website" placeholder="" value="{{ old('website') }}"
                        />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-globe"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->has('location'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('location') }}</strong>
                @endalert

            @endif

            @if ($errors->has('website'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('website') }}</strong>
                @endalert

            @endif

            <div class="row">
                <label class="col-sm-2 form-control-label">Categorias</label>
                <div class="col-sm-10">
                    <div class="form-group input-group">
                        <textarea rows="1" name="keywords"
                            class="tags-editor-textarea form-control {{ $errors->has('keywords') ? 'form-control-danger' : '' }}"
                        >{{ old('keywords') ? old('keywords') : 'importante' }}</textarea>
                    </div>
                </div>
            </div>

            @if ($errors->has('keywords'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('keywords') }}</strong>
                @endalert

            @endif

            <div class="row">
                <label class="col-sm-2 form-control-label">Cor</label>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <input type="text"
                            class="mini-colors form-control {{ $errors->has('color') ? 'form-control-danger' : '' }}"
                            name="color" placeholder="" value="{{ old('color') }}"
                        />
                    </div>
                </div>
            </div>

            @if ($errors->has('color'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('color') }}</strong>
                @endalert

            @endif

            <div class="row">
                <label class="col-sm-2 form-control-label">Visibilidade</label>
                <div class="col-sm-10">
                    <div class="form-group input-group">
                        <div class="checkbox-detailed">
                            <input type="radio" name="is_private" id="is_private-1" value="1"
                                {{ old('is_private') == '1' || empty(old('is_private')) ? 'checked' : '' }}
                            />
                            <label for="is_private-1">
                            <span class="checkbox-detailed-tbl">
                                <span class="checkbox-detailed-cell">
                                    <span class="checkbox-detailed-title">Privado</span>
                                    somente você
                                </span>
                            </span>
                            </label>
                        </div>
                        <div class="checkbox-detailed">
                            <input type="radio" name="is_private" id="is_private-2" value="0"
                                {{ old('is_private') == '0' ? 'checked' : '' }}
                            />
                            <label for="is_private-2">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Público</span>
                                        aberto a todos
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->has('is_private'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('is_private') }}</strong>
                @endalert

            @endif

            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-inline btn-primary">Salvar</button>
                    <a href="{{ url('/events') }}" class="btn btn-inline btn-secondary">Cancelar</a>
                </div>
            </div>

        </form>

    </div>

</div>

@endsection

@section('scripts')

<script src="{{ asset('js/lib/flatpickr/flatpickr.min.js') }}"></script>

<script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js') }}"></script>
<script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js') }}"></script>

<script src="{{ asset('js/lib/jquery-minicolors/jquery.minicolors.min.js') }}"></script>

<script>

    $(function() {

        $('.flatpickr').flatpickr({
            altInput: true,
            altFormat: "d/m/Y H:i",
            dateFormat: "Y-m-d H:i:S",
            minDate: "today",
            enableTime: true,
            time_24hr: true,
        });

        $('.tags-editor-textarea').tagEditor();

        $('.mini-colors').minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || '',
            format: $(this).attr('data-format') || 'hex',
            keywords: $(this).attr('data-keywords') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
            theme: 'bootstrap'
        });

    });

</script>

@endsection
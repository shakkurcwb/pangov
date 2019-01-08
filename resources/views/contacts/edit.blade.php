@extends('shared.template-auth')

@section('stylesheets')

@endsection

@section('content-header')

<div class="container-fluid">

    <div class="tbl">
        <div class="tbl-row">

            <div class="tbl-cell">
                <h4>Editar Contato</h4>
            </div>
            <div class="tbl-cell tbl-cell-action">
                <a href="{{ url('/contacts') }}" class="btn btn-inline btn-secondary">
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

        <form name="frm_update" action="{{ url('/contacts/' . $contact->id) }}" method="post">
            @csrf
            @method('patch')

            <h5 class="m-t-lg with-border">Dados Principais</h5>

            <div class="row">
                <label class="col-sm-2 form-control-label">Nome <font color="red">*</font></label>
                <div class="col-sm-10">
                    <div class="form-group input-group">
                        <input type="text"
                            class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                            name="name" placeholder="" value="{{ old('name') ? old('name') : $contact->name }}" required
                        />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="font-icon glyphicon glyphicon-font"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->has('name'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('name') }}</strong>
                @endalert

            @endif

            <div class="row">
                <label class="col-sm-2 form-control-label">Telefone</label>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <input type="text"
                            class="form-control {{ $errors->has('phone') ? 'form-control-danger' : '' }}"
                            name="phone" placeholder="11 91234 5678" value="{{ old('phone') ? old('phone') : $contact->phone }}"
                        />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="font-icon glyphicon glyphicon-earphone"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <label class="col-sm-2 form-control-label">E-mail</label>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <input type="text"
                            class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}"
                            name="email" placeholder="" value="{{ old('email') ? old('email') : $contact->email }}"
                        />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="font-icon glyphicon glyphicon-envelope"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->has('number'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('number') }}</strong>
                @endalert


            @endif

            @if ($errors->has('email'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('email') }}</strong>
                @endalert
            

            @endif

            <h5 class="m-t-lg with-border">Informações Adicionais</h5>

            <div class="row">
                <label class="col-sm-2 form-control-label">Cargo</label>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <input
                            type="text" class="form-control {{ $errors->has('position') ? 'form-control-danger' : '' }}"
                            name="position" placeholder="" value="{{ old('position') ? old('position') : $contact->position }}"
                        />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-thumb-tack"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <label class="col-sm-2 form-control-label">Empresa</label>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <input type="text"
                            class="form-control {{ $errors->has('company') ? 'form-control-danger' : '' }}"
                            name="company" placeholder="" value="{{ old('company') ? old('company') : $contact->company }}"
                        />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-institution"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->has('position'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('position') }}</strong>
                @endalert

            @endif

            @if ($errors->has('company'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('company') }}</strong>
                @endalert

            @endif

            <h5 class="m-t-lg with-border">Redes Sociais</h5>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-whatsapp"></i>
                            </span>
                        </div>
                        <input type="text"
                            class="form-control {{ $errors->has('whatsapp') ? 'form-control-danger' : '' }}"
                            name="whatsapp" placeholder="11 91234 5678" value="{{ old('whatsapp') ? old('whatsapp') : $contact->whatsapp }}"
                        />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-facebook"></i>
                            </span>
                        </div>
                        <input type="text"
                            class="form-control {{ $errors->has('facebook') ? 'form-control-danger' : '' }}"
                            name="facebook" placeholder="" value="{{ old('facebook') ? old('facebook') : $contact->facebook }}"
                        />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-instagram"></i>
                            </span>
                        </div>
                        <input type="text"
                            class="form-control {{ $errors->has('instagram') ? 'form-control-danger' : '' }}"
                            name="instagram" placeholder="" value="{{ old('instagram') ? old('instagram') : $contact->instagram }}"
                        />
                    </div>
                </div>
            </div>

            @if ($errors->has('whatsapp'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('whatsapp') }}</strong>
                @endalert

            @endif

            @if ($errors->has('facebook'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('facebook') }}</strong>
                @endalert

            @endif

            @if ($errors->has('instagram'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('instagram') }}</strong>
                @endalert

            @endif

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-twitter"></i>
                            </span>
                        </div>
                        <input type="text"
                            class="form-control {{ $errors->has('twitter') ? 'form-control-danger' : '' }}"
                            name="twitter" placeholder="" value="{{ old('twitter') ? old('twitter') : $contact->twitter }}"
                        />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="font-icon fa fa-linkedin"></i>
                            </span>
                        </div>
                        <input type="text"
                            class="form-control {{ $errors->has('linkedin') ? 'form-control-danger' : '' }}"
                            name="linkedin" placeholder="" value="{{ old('linkedin') ? old('linkedin') : $contact->linkedin }}"
                        />
                    </div>
                </div>
            </div>

            @if ($errors->has('twitter'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('twitter') }}</strong>
                @endalert
            
            @endif

            @if ($errors->has('linkedin'))

                @alert([ 'class' => 'danger' ])
                    <strong>{{ $errors->first('linkedin') }}</strong>
                @endalert

            @endif

            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-inline btn-primary">Salvar</button>
                    <a href="{{ url('/contacts') }}" class="btn btn-inline btn-secondary">Cancelar</a>
                    <a href="{{ url('/contacts') }}" class="btn btn-inline btn-danger"
                        onclick="event.preventDefault(); if (confirm('Deseja realmente excluir este contato? Esta ação não pode ser desfeita!')) document.getElementById('frm-delete').submit();"
                    >Excluir</a>
                </div>
            </div>

        </form>

        <form name="frm_delete" id="frm-delete" action="{{ url('/contacts/' . $contact->id) }}" method="post">
            @csrf
            @method('delete')
        </form>

    </div>

</div>

@endsection

@section('scripts')

@endsection
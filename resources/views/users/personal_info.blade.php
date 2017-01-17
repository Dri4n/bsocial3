@extends('layouts.app')

@section('content')
	    <div class="wide-content">
        <div class="settings-wrapper" id="pad-wrapper">
            <div class="row">
                <!-- avatar column -->
                <div class="col-md-3 col-md-offset-1 avatar-box">
                    <div class="personal-image">

                        <img src="/img/personal-info.png" class="avatar img-circle" alt="avatar" />

                        <p>Upload a file</p>

                        <form method="POST" action="/users/{{
                            $user->id
                            }}/avatar" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="avatar" class="form-control">
                            <input type="submit" class="btn btn-success btn-xs" style="margin-top: 5px;"> 
                        </form>
                        
                        @if (Session::has('upload_ok'))
                           <strong>{{ Session::get('upload_ok') }}</strong>
                        @endif

                        @if($errors->has('avatar'))
                            <strong>{{ $errors->first('avatar') }}</strong>
                        @endif
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-7 personal-info">
                    <h5 class="personal-title">
                       <strong>Información Personal</strong>
                    </h5>
                    <br />
                    <form class="form-horizontal" action="\users\{{ $user -> id}}\update_personal_info" role="form" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-lg-2 control-label">{{ Lang::get('validation.attributes.email')}}</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="email" type="text" value="{{ $user->email }}" />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="col-lg-2 control-label">{{ Lang::get('validation.attributes.first_name')}}</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="first_name" type="text" value="{{ $user->first_name }}" />
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="col-lg-2 control-label">{{ Lang::get('validation.attributes.last_name')}}</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="last_name" type="text" value="{{ $user->last_name }}" />
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- TODO aprender como guardar fechas en laravel... -->
{{--                         <div class="form-group">
                            <label class="col-lg-2 control-label">{{ Lang::get('validation.attributes.birth_date')}}</label>
                            <div class="col-lg-8">
                                <input class="date form-control" data-date-format="dd-mm-yyyy" name="birth_date" type="text" value="{{ date('d-m-Y', strtotime($user->birth_date)) }}" />
                            </div>
                        </div> --}}
                        <div class="actions">
                            <input type="submit" class="btn-primary btn btn-xs" value="Guardar Cambios">
                        </div>
                    </form>

                    <hr />

                    <h5 class="personal-title">
                       <strong>Información de Usuario</strong>
                    </h5>
                    <br />
                    <form class="form-horizontal" action="\users\{{ $user -> id}}\update_account_info" role="form" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-lg-2 control-label">{{ Lang::get('validation.attributes.username')}}</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="name" type="text" value="{{ $user->name }}" />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-lg-2 control-label">{{ Lang::get('validation.attributes.password')}}</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="password" type="password" value="{{ $user->password }}" />
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">{{ Lang::get('validation.attributes.password_confirmation')}}</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="password_confirmation" type="password" value="{{ $user->password }}" />
                            </div>
                        </div>
                        <br />
                        <div class="actions">
                            <input type="submit" class="btn-primary btn btn-xs" value="Guardar Cambios">
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
@endsection
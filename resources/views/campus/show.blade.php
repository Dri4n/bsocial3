@extends('layouts.app')

@section('content')
	<div class="wide-content">
        <div class="settings-wrapper" id="pad-wrapper">
        	<div class="row">
        		<div class="col-md-12 personal-info">
        			<h5 class="personal-title">
                       <strong>Información Campus</strong>
                    </h5>
                    <br />
                    <form class="form-horizontal" action="\users\{{ $campus -> id}}">
                    	{{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-lg-2 control-label">{{ ucfirst(Lang::get('validation.attributes.name')) }}</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="name" type="text" value="{{ $campus->name }}" />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-lg-2 control-label">{{ ucfirst(Lang::get('validation.attributes.address'))}}</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="address" type="text" value="{{ $campus->address }}" />
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('host') ? ' has-error' : '' }}" readonly>
                            <label class="col-lg-2 control-label">{{ ucfirst(Lang::get('validation.attributes.host'))}}</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="host" type="text" value="{{ $campus->host }}" readonly/>
                                @if ($errors->has('host'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('host') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </form>

                    <hr>

					<h5 class="personal-title">
						<strong>Usuarios Campus</strong>
					</h5>

					<form method="POST" action="" enctype="multipart/form-data" class="pull-right" style="margin-bottom: 15px;">
                        {{ csrf_field() }}
                        <h5>Seleccione un archivo de carga...</h5>
                        <input type="file" name="avatar">
                        <input type="submit" class="btn btn-success btn-xs" value="Importar"> 
                        <br>
                    </form>

                    <br>
                    <br>

					<div>
						<table class="table table-condensed table-strip">
							<thead>
								<th>{{ ucfirst(Lang::get('validation.attributes.username')) }}</th>
								<th>{{ ucfirst(Lang::get('validation.attributes.first_name')) }}</th>
								<th>{{ ucfirst(Lang::get('validation.attributes.last_name')) }}</th>
							</thead>
							<tbody>
								@foreach ($campus->users as $user)
									<tr>
                    					<td><span>{{ $user->name }}</span></td>
                    					<td><span>{{ $user->first_name }}</span></td>
                    					<td><span>{{ $user->last_name }}</span></td>
                					</tr>
                				@endforeach
							</tbody>
						</table>
					</div>
        		</div>
        	</div>
        </div>
    </div>
@endsection
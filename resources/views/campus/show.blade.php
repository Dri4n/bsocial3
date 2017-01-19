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
        		</div>
        	</div>
        </div>
    </div>
@endsection
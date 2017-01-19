@extends('layouts.app')

@section('head')	
@endsection

@section('content')
	<div class="wide-content">
        <div class="settings-wrapper" id="pad-wrapper">

			<div class="row" style="margin-top: 15px;margin-bottom: 15px;">
				<div class="col-md-3">
					<form method="GET" action="/campus/{{1}}/users" class="pull-left">
						<div class="input-group">
						      <input type="text" name="keyword" value="{{ $keyword ? $keyword : old('keyword') }}" class="form-control" placeholder="{{ 
						        		Lang::get('form.search')
						        	}}">
						      <span class="input-group-btn">
						        <button class="btn btn-success" type="submit">
						        	{{ 
						        		Lang::get('form.buttons.search')
						        	}}
						        </button>
						      </span>
						</div>
					</form>
				</div>
				<div class="col-md-8">
					<form method="POST" action="" enctype="multipart/form-data" class="pull-right">
		                {{ csrf_field() }}
		                <h5>Seleccione un archivo de carga...</h5>
		                <input type="file" name="avatar">
		                <input type="submit" class="btn btn-success btn-xs" value="Importar"> 
		                <br>
		            </form>					
				</div>
			</div>

            <br>
            <br>

			<div class="row">
				<table class="table table-condensed table-strip">
					<thead>
						<th>{{ ucfirst(Lang::get('validation.attributes.username')) }}</th>
						<th>{{ ucfirst(Lang::get('validation.attributes.email')) }}</th>
						<th>{{ ucfirst(Lang::get('validation.attributes.first_name')) }}</th>
						<th>{{ ucfirst(Lang::get('validation.attributes.last_name')) }}</th>
					</thead>
					<tfoot>
					    <tr>
					      <td colspan="3" class="text-center">
					      {!! $users->appends(['sort' => 'first_name','keyword' => $keyword])->render() !!}
					      </td>
					    </tr>
				    </tfoot>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td>
									<a href="/campus/users/{{$user->id}}">
										{{ $user->name }}
									</a>
								</td>
								<td><span>{{ $user->email }}</span></td>
								<td><span>{{ $user->first_name }}</span></td>
								<td><span>{{ $user->last_name }}</span></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

        </div>
    </div>
@endsection

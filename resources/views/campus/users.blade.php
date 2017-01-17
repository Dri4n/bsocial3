@extends('layouts.app')

@section('head')	
@endsection

@section('content')
	<div class="wide-content">
        <div class="settings-wrapper" id="pad-wrapper">
        	<table class="table table-condensed table-strip">
				<thead>
					<th>{{ ucfirst(Lang::get('validation.attributes.username')) }}</th>
					<th>{{ ucfirst(Lang::get('validation.attributes.first_name')) }}</th>
					<th>{{ ucfirst(Lang::get('validation.attributes.last_name')) }}</th>
				</thead>
				<tfoot>
				    <tr>
				      <td colspan="3" class="text-center">{{$users->links()}}</td>
				    </tr>
			    </tfoot>
				<tbody>
					@foreach ($users as $user)
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
@endsection

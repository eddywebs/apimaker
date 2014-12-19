@extends('master')

@section('title')
	Edit an Api
@stop

@section('content')
<div class="starter-template">
		<div class="jumbotron" style="text-align: left;">
		<h2>Edit {{ $dataset['description'] }}</h2>
		<br>
		{{ Form::open(array('url' => 'dataset/edit', 'method' => 'put')) }}
<!-- 
		add 'id' in hidden field since this how update controller will catch the record to be updates -->
		{{ Form::hidden('id', $dataset['id']); }}
				<!-- action: add validation on description field-->
		{{ Form::label('description','Api Description (required)') }}
		{{ Form::text('description', $dataset['description']); }}
		<br>

		{{ Form::label('dbname','Database Name') }}
		{{ Form::text('dbname', $dataset['dbname']); }}
		<br>
		{{ Form::label('username','Database server username') }}
		{{ Form::text('username', $dataset['username']); }}
		<br>
		{{ Form::label('password','Database server password') }}
		{{ Form::text('password', $dataset['password']); }}
		<br>
		{{ Form::label('hostname','Hostname') }}
		{{ Form::text('hostname', $dataset['hostname']); }}
		<br>
		{{ Form::label('port','Port Number (3306 for mysql)') }}
		{{ Form::number('port', $dataset['port']); }}
		<br>
		{{ Form::label('dbtype','Database type') }} <!-- change it to picklist ? !-->
		{{ Form::text('dbtype', $dataset['dbtype']); }}
		<br>

		{{ Form::label('table_blacklist','Available Tables:') }}
		@foreach($tables as $id => $table)
				{{ $table["value"] }}
				<!-- {{ Form::checkbox('table_blacklist[]', $table["id"], $table["blacklisted"] ) }} -->
				&nbsp;&nbsp;&nbsp;
			@endforeach

		<br>
		{{ Form::submit('Update'); }}
	{{ Form::close() }}

		<div>
		{{---- DELETE -----}}
		{{ Form::open(['method' => 'DELETE', 'action' => ['datasetController@destroy', $dataset->id]]) }}
		    {{ Form::submit('Delete'); }}
		{{ Form::close() }}
	</div>

	</div>
</div>
<p>
	<!-- some more content in case?-->
</p>
@stop
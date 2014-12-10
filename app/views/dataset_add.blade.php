@extends('master')

@section('title')
	Create/Edit an Api
@stop

@section('content')
<div class="starter-template">
		<div class="jumbotron" style="text-align: left;">
		<h2>Make an Api !</h2>
		<p>Create an api from a database connection.</p>
		<br>
		<!--form goes here!-->
		{{ Form::open(array('url' => 'dataset')) }}

		{{ Form::label('dbname','Database Name') }}
		{{ Form::text('dbname'); }}
		<br>
		{{ Form::label('username','Database server username') }}
		{{ Form::text('username'); }}
		<br>
		{{ Form::label('password','Database server password') }}
		{{ Form::text('password'); }}
		<br>
		{{ Form::label('hostname','Hostname') }}
		{{ Form::text('hostname'); }}
		<br>
		{{ Form::label('port','Port Number (3306 for mysql)') }}
		{{ Form::number('port'); }}
		<br>
		{{ Form::label('dbtype','Database type') }} <!-- change it to picklist ? !-->
		{{ Form::text('dbtype'); }}
		<br>
		{{ Form::submit('Add'); }}

	{{ Form::close() }}

	</div>
</div>
<p>
	<!-- some more content in case?-->
</p>
@stop
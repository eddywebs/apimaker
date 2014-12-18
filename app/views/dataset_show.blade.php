@extends('master')

@section('title')
	Access {{ $dataset['description'] }}Api
@stop

@section('content')
<div class="starter-template" style="text-align: left;">
	<h2>{{ $dataset['description'] }}</h2>
	<hr>
	<div class="jumbotron" style="text-align: left;">
		<p>API endpoint: /api/v1/{{ $dataset['id'] }}/db={{ $dataset['dbname'] }}&table=datasets&format=json</p>	
	</div>
</div>
<p>
	<!-- some more content in case?-->
</p>
@stop
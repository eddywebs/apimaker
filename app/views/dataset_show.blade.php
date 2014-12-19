@extends('master')

@section('title')
	Access {{ $dataset['description'] }}Api
@stop

@section('content')
<div class="starter-template" style="text-align: left;">
	<h2>{{ $dataset['description'] }}</h2>
	<hr>
	<div class="jumbotron" style="text-align: left;">

		<ul>
		@foreach($tables as $id => $table)			
			<li>API endpoints: <a href="/api/v1/{{ $dataset['id'] }}/db={{ $dataset['dbname'] }}&table={{ $table["value"] }}&format=json">
			 /api/v1/{{ $dataset['id'] }}/db={{ $dataset['dbname'] }}&table={{ $table["value"] }}&format=json 
			</a></li>
		@endforeach	
		<ul>
	</div>
</div>
<p>
	<!-- some more content in case?-->
</p>
@stop
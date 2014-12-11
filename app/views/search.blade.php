@extends('master')

@section('title')
	Show APIs
@stop

@section('content')
<div class="starter-template" style="text-align: left;">
<!-- 	<div class="jumbotron" style="text-align: left;"> -->
		@if($datasets==null)
			<h2>boo no apis for you</h2>
		@else
			@if($query==null)
				<h2>All available APIs</h2>
				@else
				<h2>Here are Apis for term: {{ $query }}</h2>		
			@endif
			<hr>
			@foreach($datasets as $dataset)
				<section>
					<h3> - {{ $dataset['description'] }} <a href='/dataset/edit/{{ $dataset['id'] }}'>Edit</a><h3>
				</section>
			@endforeach	
				
		@endif
		<br>
		

<!-- 	</div> -->
</div>
<p>
	<!-- some more content in case?-->
</p>
@stop
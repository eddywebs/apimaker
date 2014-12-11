@extends('master')

@section('title')
	Show APIs
@stop

@section('content')
<div class="starter-template">
		<div class="jumbotron" style="text-align: left;">
		<h2>Available Apis</h2>
		@if($query==null)
			<p>boo no apis for you</p>
		@else
				
		@endif
		<br>
		

	</div>
</div>
<p>
	<!-- some more content in case?-->
</p>
@stop
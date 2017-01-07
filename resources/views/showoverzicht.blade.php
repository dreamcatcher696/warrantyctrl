@extends('master.master')
@section('content')
	<div class="text-center">
		<div class="col-md-8 col-md-offset-2">
		 	@if (Session::has('success_delete'))
	        	<div class="alert alert-success alert-dismissable fade in ">
	            	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            	Garantiebewijs is verwijderd!
	        	</div>
	    	@endif
	    	@if (Session::has('success_login'))
	    		<div class="alert alert-success alert-dismissable fade in ">
	            	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            	U bent nu ingelogd!
	        	</div>
	    	@endif

			<h1>Overzicht</h1>
			<hr>
			<ul class="list-group">
				@foreach($file as $file)
					<li class="list-group-item">
					<a href="/garantiebewijzen/{{$file->id}}" >{{$file->titel}}
					</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@stop
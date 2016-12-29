@extends('master.master')
@section('content')
	<div class="text-center">
	<h1>Overzicht</h1>
		<div class="col-md-8 col-md-offset-2">
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
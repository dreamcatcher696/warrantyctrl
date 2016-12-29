@extends('master.master')
@section('header')
	<style type="text/css">
        .embed-responsive {
            position: relative;
            display: block;
            height: 0;
            padding: 0;
            overflow: hidden;
        }
        </style>

@stop
@section('content')
	<div class="text-center">
		<div class="col-md-8 col-md-offset-2">
			@if($file->verloop_datum < \Carbon\Carbon::today())
				<div class=" alert alert-warning alert-dismissable fade in">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				U heeft geen garantie meer op het huidig artikel.
    			</div>
    		@else
    			<div class=" alert alert-info alert-dismissable fade in">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				De garantie voor het huidig artikel is nog geldig.
    			</div>
    		@endif
            @if (Session::has('success_update'))
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Update gelukt!
                </div>
            @endif
    		
			<h1>{{$file->titel}}</h1>
			<h3>{{$file->beschrijving}}</h3>
			<h3>Aangekocht op: {{$file->aankoop_datum}}</h3>
			<h3>verloopt op: {{$file->verloop_datum}}</h3>
			{{-- <embed src="storage/app/garantiebewijzen/{{$file->user_id}}/{{$file->filename}}"/> --}}
			<div class='embed-responsive' style='padding-bottom:50%'>
            <object data='/storage/garantiebewijzen/{{$file->user_id}}/{{$file->filename}}' width='100%' height='100%'></object>
            </div>
            <form method="GET" action="/update_garantie/{{$file->id}} ">
            

                <div class="form-group" style='padding:1%'>
                    <button type="submit" class="btn btn-primary" name="wijzig" value="True">Wijzig Garantiebewijs</button>
                    <button type="submit" class="btn btn-danger" name="verwijder" value="True">Verwijder Garantiebewijs</button>
                </div>
            </form>
		</div>
	</div>
@stop
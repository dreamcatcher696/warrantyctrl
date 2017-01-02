@extends('master.master')
@section('header')
  <link href="kartik-v/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="kartik-v/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
  <script src="kartik-v/bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="kartik-v/bootstrap-fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
  <script src="kartik-v/bootstrap-fileinput/js/fileinput.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="kartik-v/bootstrap-fileinput/themes/fa/theme.js"></script>
  <script src="kartik-v/bootstrap-fileinput/js/locales/<lang>.js"></script>
  <script>
    $(document).on("ready", function() {
        $("#file").fileinput({
          'showUpload':false,

        });
    });
  </script>
@stop
@section('content')
  
    
      
	<div class="col-md-6 col-md-offset-3">
  @if (count($errors))
    <div class="col-sm-offset-2 alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
    @endif
    @if (Session::has('success_upload'))
      <div class="col-sm-offset-2 alert alert-success alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Upload gelukt!
      </div>
    @endif

    <form method="POST" action="files/upload" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group {{$errors->has('titel') ? 'has-error has-feedback' : ''}}">
        <label class="control-label col-sm-2" for="titel">Titel</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="titel" placeholder="voeg een titel toe" value="{{old('titel')=='' ? '' : old('titel')}}">
            @if($errors->has('titel'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
        </div>
      </div>
      <div class="form-group {{$errors->has('aankoop_datum') ? 'has-error has-feedback' : ''}}">
        <label class="control-label col-sm-2" for="aankoop_datum">Aankoopdatum</label>
        <div class="col-sm-10">
          <input class="form-control" type="date" name="aankoop_datum" value="{{old('aankoop_datum')=='' ? '' : old('aankoop_datum')}}">
          @if($errors->has('aankoop_datum'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
        </div>
      </div>
      <div class="form-group {{$errors->has('verloop_datum') ? 'has-error has-feedback' : ''}}">
        <label class="control-label col-sm-2" for="verloop_datum">Verloopt op</label>
        <div class="col-sm-10">
          <input class="form-control" type="date" name="verloop_datum" value="{{old('verloop_datum')=='' ? '' : old('verloop_datum')}}">
          @if($errors->has('verloop_datum'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="beschrijving">Beschrijving</label>
        <div class="col-sm-10">
          <textarea class="form-control" type="text" name="beschrijving" placeholder="Voeg een korte beschrijving in">{{old('beschrijving')}}</textarea>
        </div>
      </div>
      <div class="form-group {{$errors->has('filename') ? 'has-error has-feedback' : ''}}">
        <label class="control-label col-sm-2" for="file">Bestand</label>
        <div class="col-sm-10">
          <input type="file" accept="application/pdf" name="filename" id="file" data-allowed-file-extensions='["pdf"]'>
          
        </div>
      </div>
      <div class="col-sm-2"></div>
      <div class="form-group ">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    <div class="col-sm-2"></div>

	</div>
@stop
@extends('layout.default')

@section('content')

<h1>Contact us</h1>
</hr>

{!! Form::open([ 'action'=>'PagesController@dosend','method'=>'POST' ]) !!}
	<div class="form-group">
			{{ Form::label('Name')}}
			{{ Form::text('name','',['placeholder'=>'Enter Post Name','class'=>'form-control']) }}
	</div>
	<div class="form-group">
			{{ Form::label('Email')}}
			{{ Form::text('email','',['placeholder'=>'Enter your email','class'=>'form-control']) }}
	</div>	
	<div class="form-group">
			{{ Form::label('subject')}}
			{{ Form::text('subject','',['placeholder'=>'Enter your subject','class'=>'form-control']) }}
	</div>

	<div class="form-group">	
			{{ Form::label('Body')}}
			{{ Form::textarea('body','',
				['placeholder'=>'Enter Message','class'=>'form-control']) }}
	</div>
	<div class="form-group pull-right">
		{{ Form::submit('Send Message',['class'=>'btn btn-primary']) }}
	</div>		

{!! Form::close() !!}
@endsection
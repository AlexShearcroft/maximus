@extends('base.master')
@section('title', 'Maximus - Contact')
@section('meta_desc', 'Sending a contact form using the Maximus framework')
@section('content')
<h1>Contact</h1>
@if(Session::has('message'))
<div class="">
  {{Session::get('message')}}
</div>
@else
<ul>
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</ul>
{!! Form::open(array('route' => 'contact_store', 'class' => '')) !!}
<div>
	<br>
	{!! Form::label('Your Name') !!}
	<br>
	{!! Form::text('name', null, array('required', 'class'=>'', 'placeholder'=>'Your name')) !!}
</div>
<div>
	<br>
	{!! Form::label('Your E-mail Address') !!}
	<br>
	{!! Form::text('email', null, array('required', 'class'=>'', 'placeholder'=>'Your e-mail address')) !!}
</div>
<div>
	<br>
	{!! Form::label('Your Message') !!}
	<br>
	{!! Form::textarea('message', null, array('required', 'class'=>'', 'placeholder'=>'Your message')) !!}
</div>
<div>
	{!! Form::submit('Send', array('class'=>'')) !!}
</div>
{!! Form::close() !!}
@endif

@stop
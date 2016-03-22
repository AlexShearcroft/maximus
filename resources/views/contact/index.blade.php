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
	{!! Form::label('Your Name') !!}
	{!! Form::text('name', null, array('required', 'class'=>'', 'placeholder'=>'Your name')) !!}
</div>
<div>
	{!! Form::label('Your E-mail Address') !!}
	{!! Form::text('email', null, array('required', 'class'=>'', 'placeholder'=>'Your e-mail address')) !!}
</div>
<div>
	{!! Form::label('Your Message') !!}
	{!! Form::textarea('message', null, array('required', 'class'=>'', 'placeholder'=>'Your message')) !!}
</div>
<div>
	{!! Form::submit('Send', array('class'=>'')) !!}
</div>
{!! Form::close() !!}
@endif
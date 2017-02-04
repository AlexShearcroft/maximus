@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit: {!! $article->title !!}</h1>

    {!! Form::model($article, ['method' => 'PATCH', 'url' => 'admin/articles/'.$article->id]) !!}
        @include('admin/articles/partials/form', ['submitButtonText' => 'Update article'])
    {!! Form::close() !!}

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</div>
@endsection
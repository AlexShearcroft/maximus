@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Write a new article</h1>

        {!! Form::model($article = new \App\Models\Article, ['url' => 'admin/articles']) !!}
            @include('admin/articles/partials/form', ['submitButtonText' => 'Add article'])
        {!! Form::close() !!}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    </div>
@endsection
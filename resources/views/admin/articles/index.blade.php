@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (Session::has('flash_message'))
        <div>
            <p>
                {{ Session::get('flash_message') }}
            </p>
        </div>
        @endif

        <h1>Articles</h1>

        @foreach ($articles as $article)

        <article>
            <h2>
                <a href="{{ url('/admin/articles/'.$article->id.'/edit') }}">{{ $article->title }}</a>
            </h2>
            {{--<div>
                {{ $article->body }}
            </div>--}}
            {{-- Insert a modal and then delete  --}}
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#article-{{ $article->id }}">Delete</button>
        </article>
        <div class="modal fade" id="article-{{ $article->id }}" tabindex="1" role="dialog" aria-labelledby="article-{{ $article->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="{{ url('/admin/articles/'.$article->id.'/delete') }}" class="btn btn-primary">Delete</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        @endforeach
    </div>
@endsection
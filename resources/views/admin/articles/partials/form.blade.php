<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['id' => 'body', 'class' => 'js-ckeditor form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Publish on:') !!}
    {!! Form::input('date', 'published_at', $article->published_at, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'js-tag-list', 'class' => 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script src="{{ elixir('js/all.js') }}"></script>
    <script src="{{ url('build/js/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ url('build/js/ckeditor/adapters/jquery.js') }}"></script>
    <script>
        $('#js-tag-list').select2({
            placeholder: 'Choose a tag'/*,
            tags: true*/
        });
        
        //CKEDITOR.replace('body');
        $('.js-ckeditor').ckeditor({
            filebrowserImageUploadUrl: '/admin/image/CKEditor-upload',
            removeButtons: 'About,Format,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,Font,FontSize,Smiley,TextColor,BGColor'
        });
        
    </script>
@endsection
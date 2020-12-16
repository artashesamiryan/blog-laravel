@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{route('post.store')}}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="title" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea type="password" class="ckeditor" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
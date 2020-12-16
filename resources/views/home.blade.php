@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form>
            <select class="form-control" name="sort" onchange='if(this.value != 0) { this.form.submit(); }'>
                <option selected>Sort By</option>
                <option value="desc">Newest First</option>
                <option value="asc">Oldest First</option>
            </select>
        </form>
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card my-4">
                <div class="card-header">
                    {{$post->title}}
                </div>
                <div class="card-body">
                    {!! $post->description !!}
                    <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Post By <cite title="Source Title">{{$post->user->name}}</cite>
                            {{$post->publication_date}}
                        </footer>
                        
                    </blockquote>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    {{$posts->links()}}
</div>
@endsection
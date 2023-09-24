@extends('admin.admin')
@section('title','Post Details')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <h4 class="text-center">
                Post Details
            </h4>
            <div>
                <img class="text-center" src="{{ '/storage/post_images/'.$post->image }}" alt="" width="50%">
                <div class="d-flex justify-content-between">
                    <p>{{ $post->created_at->diffForHumans()}}</p>
                    <p>{{ Auth::guard('admin')->user()->name }}</p>
                </div>
            </div>
            <div class="my-2">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->sub_title }}</p>
                <p>
                    {!! $post->description !!}
                </p>
                @if (Route::has('admin.post.create'))
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Back Post</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

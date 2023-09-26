@extends('app')
@section('title','Blog Home')
@section('content')
<section class="section-sm">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 mb-5 mb-lg-0">
    <h2 class="h5 section-title">Recent Post</h2>
    @foreach ($posts as $post)
    <article class="card mb-4">
      <div class="row card-body">
        <div class="col-md-4 mb-4 mb-md-0">
          <div class="post-slider slider-sm">
            <img src="{{ asset('/storage/post_images/'.$post->image) }}" class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">
            <img src="{{ asset('/storage/post_images/'.$post->image) }}" class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">
          </div>
        </div>
        <div class="col-md-8">
          <h3 class="h4 mb-3"><a class="post-title" href="{{ route('front.post_detials',$post->id) }}">{{ $post->title }}</a></h3>
          <ul class="card-meta list-inline">
            <li class="list-inline-item">
              <a href="" class="card-meta-author">
                {{-- <img src="images/john-doe.jpg" alt="John Doe"> --}}
                {{-- <span>{{ Auth::guard('admin')->user()->name }}</span> --}}
              </a>
            </li>
            <li class="list-inline-item">
              <i class="ti-timer"></i>{{ $post->created_at->diffForHumans() }}
            </li>
            <li class="list-inline-item">
              <i class="ti-calendar"></i>{{ $post->created_at->format('Y-M-D') }}
            </li>
            {{-- <li class="list-inline-item">
              <ul class="card-meta-tag list-inline">
                <li class="list-inline-item"><a href="tags.html">Demo</a></li>
                <li class="list-inline-item"><a href="tags.html">Elements</a></li>
              </ul>
            </li> --}}
          </ul>
          <p>{{ $post->sub_title }}</p>
          <a href="{{ route('front.post_detials',$post->id) }}" class="btn btn-outline-primary">Read More</a>
        </div>
      </div>
    </article>
    @endforeach
    <div class="justify-content-center">
        {{-- {{ $posts->links() }} --}}
    </div>
  </div>
      </div>
    </div>
</section>

@endsection

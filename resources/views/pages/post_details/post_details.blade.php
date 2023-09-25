@extends('app')
@section('title','Post Detils')
@push('front_link')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')
<section class="section">
    <div class="container">

      <div class="row justify-content-center">
        <div class=" col-lg-9   mb-5 mb-lg-0">
          <article>
            <div class="post-slider mb-4">
              <img src="{{ asset('/storage/post_images/'.$post->image) }}" class="card-img" alt="post-thumb">
            </div>
            <h1 class="h2">{{ $post->title }}</h1>
            <ul class="card-meta my-3 list-inline">
              <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                  <img src="{{ asset('frontend') }}/images/john-doe.jpg">
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
                  <li class="list-inline-item"><a href="tags.html">Color</a></li>
                  <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                  <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                </ul>
              </li> --}}
            </ul>
            <div class="content"><p>{!! $post->description !!}</p>
            </div>
          </article>

        </div>
        <div class="col-lg-9 col-md-12">
            <div class="mb-5 border-top mt-4 pt-5">
                <h3 class="mb-4">Comments</h3>
                @foreach ($comments as $comment)
                <div class="media d-block d-sm-flex mb-4 pb-4">
                    <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                        <img src="{{ asset('frontend') }}/images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
                    </a>
                    <div class="media-body">
                        @auth
                        <a href="#!" class="h4 d-inline-block mb-3">{{ $comment->user_name }}</a>
                        @endauth

                        <p>{!! $comment->comment !!}</p>

                        <span class="text-black-800 mr-3 font-weight-600">{{ $comment->created_at->format('Y-M-D') }} at {{ $comment->created_at->format('h:i:s') }}</span>
                        @auth
                        @php
                            $likes = DB::table('comment_likes')
                                    ->where('comment_id',$comment->id)
                                    ->get();
                            $liker_user = DB::table('comment_likes')
                                        ->where('comment_id',$comment->id)
                                        ->where('user_id',auth()->user()->id)
                                        ->first();
                        @endphp
                        @if ($liker_user)
                        <a href="{{ route('front.comment.unlike',$comment->id) }}">
                            Unlike ({{ $likes->count() }})
                        </a>
                        @else
                        <a href="{{ route('front.comment.like',$comment->id) }}">
                            Like ({{ $likes->count() }})
                        </a>
                        @endif
                        @endauth

                        {{-- <a class="text-primary font-weight-600" href="#!">Reply</a> --}}
                    </div>
                </div>
                @endforeach
                {{ $comments->links() }}
              {{-- <div class="media d-block d-sm-flex">
                    <div class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                        <img class="mr-3" src="{{ asset('frontend') }}/images/post/arrow.png" alt="">
                        <a href="#!"><img src="{{ asset('frontend') }}/images/post/user-02.jpg" class="mr-3 rounded-circle" alt=""></a>
                    </div>
                    <div class="media-body">
                        <a href="#!" class="h4 d-inline-block mb-3">Nadia Sultana Tisa</a>

                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>

                        <span class="text-black-800 mr-3 font-weight-600">April 18, 2020 at 6.25 pm</span>
                        <a class="text-primary font-weight-600" href="#!">Reply</a>
                    </div>
                </div> --}}
            </div>
            <div>
                <h3 class="mb-4">Leave a Reply</h3>
                <form action="{{ route('front.comment.store',$post->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea id="comment" class="form-control shadow-none" name="comment" rows="7"></textarea>
                        </div>
                    </div>
                    @auth()
                    <button class="btn btn-primary" type="submit">Comment Now</button>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    @endauth
                </form>
            </div>
        </div>

      </div>
    </div>
</section>
@push('front_script')
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#comment').summernote({
            height: 200
        });
    });
</script>

@endpush
@endsection

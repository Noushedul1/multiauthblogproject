<section class="section pb-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-5">
          <h2 class="h5 section-title">Editors Pick</h2>
          <article class="card">
            <div class="post-slider slider-sm">
              <img src="{{ asset('/storage/post_images/'.$editorsPick->image) }}" class="card-img-top" alt="post-thumb">
            </div>

            <div class="card-body">
              <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">{{ $editorsPick->title }}</a></h3>
              <ul class="card-meta list-inline">
                <li class="list-inline-item">
                  <a href="author-single.html" class="card-meta-author">
                    <img src="{{ asset('') }}">
                    <span>{{ Auth::guard('admin')->user()->name }}</span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <i class="ti-timer"></i>{{ $editorsPick->created_at->diffForHumans() }}
                </li>
                <li class="list-inline-item">
                  <i class="ti-calendar"></i>{{ $editorsPick->created_at->format('Y-M-D') }}
                </li>
                {{-- <li class="list-inline-item">
                  <ul class="card-meta-tag list-inline">
                    <li class="list-inline-item"><a href="tags.html">Color</a></li>
                    <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                    <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                  </ul>
                </li> --}}
              </ul>
              <p>{{ $editorsPick->sub_title }}</p>
              <a href="{{ route('front.post_detials',$editorsPick->id) }}" class="btn btn-outline-primary">Read More</a>
            </div>
          </article>
        </div>
        <div class="col-lg-4 mb-5">
          <h2 class="h5 section-title">Trending Post</h2>
          @foreach ($trendingPosts as $trendingPost)
          <article class="card mb-4">
            <div class="card-body d-flex">
              <img class="card-img-sm" src="{{ asset('/storage/post_images/'.$trendingPost->image) }}">
              <div class="ml-3">
                <h4><a href="{{ route('front.post_detials',$trendingPost->id) }}" class="post-title">{{ $trendingPost->title }}</a></h4>
                <ul class="card-meta list-inline mb-0">
                  <li class="list-inline-item mb-0">
                    <i class="ti-calendar"></i>{{ $trendingPost->created_at->format('Y-D-M') }}
                  </li>
                  <li class="list-inline-item mb-0">
                    <i class="ti-timer"></i>{{ $trendingPost->created_at->diffForHumans() }}
                  </li>
                </ul>
              </div>
            </div>
          </article>
          @endforeach
        </div>

        <div class="col-lg-4 mb-5">
          <h2 class="h5 section-title">Popular Post</h2>

          <article class="card">
            <div class="post-slider slider-sm">
              <img src="{{ asset('/storage/post_images/'.$popularPost->image) }}" class="card-img-top" alt="post-thumb">
            </div>
            <div class="card-body">
              <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">{{ $popularPost->title }}</a></h3>
              <ul class="card-meta list-inline">
                <li class="list-inline-item">
                  <a href="author-single.html" class="card-meta-author">
                    <img src="{{ asset('frontend') }}/images/kate-stone.jpg" alt="Kate Stone">
                    <span>Kate Stone</span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <i class="ti-timer"></i>{{ $popularPost->created_at->format('Y-M-D') }}
                </li>
                <li class="list-inline-item">
                  <i class="ti-calendar"></i>{{ $popularPost->created_at->diffForHumans() }}
                </li>
                {{-- <li class="list-inline-item">
                  <ul class="card-meta-tag list-inline">
                    <li class="list-inline-item"><a href="tags.html">City</a></li>
                    <li class="list-inline-item"><a href="tags.html">Food</a></li>
                    <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                  </ul>
                </li> --}}
              </ul>
              <p>{{ $popularPost->sub_title }}</p>
              <a href="{{ route('front.post_detials',$popularPost->id) }}l" class="btn btn-outline-primary">Read More</a>
            </div>
          </article>
        </div>
        <div class="col-12">
          <div class="border-bottom border-default"></div>
        </div>
      </div>
    </div>
  </section>

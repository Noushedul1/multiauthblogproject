@extends('app')
@section('title','Blog Home')
@section('content')
    <!-- start of banner -->
    @include('includes.banner')
    <!-- end of banner -->
    {{-- start of editors pick  --}}
    @include('includes.editors_pick')
    {{-- end of editors pick  --}}

    {{-- start of recent posts  --}}
    @include('includes.recent_posts')
    {{-- end of recent posts  --}}
@endsection

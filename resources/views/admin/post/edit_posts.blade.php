@extends('admin.admin')
@section('title','Edit Post')
@push('dashboard_link')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h4 class="text-center">
                Post
            </h4>
            <form action="{{ route('admin.post.update',$post->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" class="form-control" id="">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $post->category_id)
                            selected
                        @endif>{{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Tile</label>
                    <input type="text" name="title" class="form-control @error('title')
                    is-invalid
                    @enderror" value="{{ $post->title }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sub title" class="form-label">Sub Tile</label>
                    <input type="text" name="sub_title" class="form-control @error('sub_title')
                    is-invalid
                    @enderror" value="{{ $post->sub_title }}">
                    @error('sub_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description')
                    is-invalid
                    @enderror" id="edit_post" cols="30" rows="10">
                    {{ $post->description }}
                    </textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <lable class="form-label">Status</lable>
                {{-- <div class="mb-3">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="1" {{ $post->status === 1 ? 'checked' : '' }} name="status" id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                    </div>
                </div> --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <img src="{{ '/storage/post_images/'.$post->image }}" alt="" height="200">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Post Update">
                </div>
            </form>
        </div>
    </div>
</div>
@push('dashboard_script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#edit_post').summernote({
            height: 200
        });
    });
</script>

@endpush
@endsection






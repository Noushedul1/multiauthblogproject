@extends('admin.admin')
@section('title','Edit Category')
@push('dashboard_link')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="conatiner">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h4 class="text-center">
                Edit Category
            </h4>
            <form action="{{ route('admin.category.update',$category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid
                    @enderror" value="{{ $category->name }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Description</label>
                    <textarea name="description" id="category_edit" cols="40" rows="10" class="form-control @error('description') is-invalid

                    @enderror">
                        {{ $category->description }}
                    </textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Update Category">
                </div>
            </form>
        </div>
    </div>
</div>
@push('dashboard_script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category_edit').summernote({
            height: 200
        });
    });
</script>

@endpush
@endsection

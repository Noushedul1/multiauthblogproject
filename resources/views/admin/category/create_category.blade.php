@extends('admin.admin')
@section('title','Category')
@push('dashboard_link')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h4 class="text-center">
                Create Category
            </h4>
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name')
                    is-invalid
                    @enderror">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Description</label>
                    <textarea name="description" id="category" cols="40" rows="10" class="form-control @error('description')
                    is-invalid
                    @enderror"></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Create Category">
                </div>
            </form>
        </div>
    </div>
</div>
@push('dashboard_script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category').summernote({
            height: 200
        });
    });
</script>

@endpush
@endsection

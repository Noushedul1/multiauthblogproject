@extends('admin.admin')
@section('title','Post')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <h4 class="text-center">Post Manage</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key=>$post)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <img src="{{ asset('/storage/post_images/'.$post->image) }}" alt="" width="100" height="100">
                        </td>
                        <td>{{ $post->category->name }}</td>
                        {{-- <td class="badge {{ $post->status === 1 ? 'badge-primary' : 'badge-danger' }}">{{ $post->status === 1 ? "Active" : "Deactive" }}</td>
                        <td> --}}
                        <td>
                            <a href="{{ route('admin.postStatus',$post->id) }}" class="btn {{ $post->status === 1 ? 'badge-primary' : 'badge-danger' }}">
                                {{ $post->status === 1 ? 'Active' : 'Deactive' }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.post.edit',$post->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.post.destroy',$post->id) }}" class="text-danger" onclick="event.preventDefault();document.getElementById('deletePost').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                            <form action="{{ route('admin.post.destroy',$post->id) }}" method="post" id="deletePost">
                            @csrf
                            @method('DELETE')
                            </form>
                            <a href="{{ route('admin.post.show',$post->id) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection

@extends('admin.admin')
@section('title','Category')
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-8 offset-2">
             <h4 class="text-center">Category Management</h4>
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Name</th>
                         <th>Description</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     @if (count($categories) > 0)
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{!! $category->description !!}</td>
                            <td>
                                <a href="{{ route('admin.category.edit',$category->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.category.destroy',$category->id) }}" class="text-danger" onclick="event.preventDefault();document.getElementById('category_delete').submit();">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form action="{{ route('admin.category.destroy',$category->id) }}" method="post" id="category_delete">
                                @csrf
                                @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="text-center">
                                <h4>Empty Category</h4>
                            </td>
                        </tr>
                     @endif
                 </tbody>
                 {{-- {{ $categories->links() }} --}}
                </table>
                {{ $categories->links() }}
         </div>
     </div>
 </div>
@endsection

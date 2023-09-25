@extends('admin.admin')
@section('title','Category')
@push('dashboard_link')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endpush
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-8 offset-2">
             <h4 class="text-center">Category Management</h4>
             <table class="table table-bordered" id="category">
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
                {{-- {{ $categories->links() }} --}}
         </div>
     </div>
 </div>
 @push('dashboard_script')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#category').DataTable();
} );
</script>
@endpush
@endsection

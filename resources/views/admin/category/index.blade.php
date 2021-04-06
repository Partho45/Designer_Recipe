@extends('layouts.backend.app')

@section('title', 'list')

@push('css')
<style>
    
 </style> 
@endpush


@section('content')

<div class="container">
    <h2>Category List</h2>

<br>
<p>
    <a class="btn btn-info" href="{{ route('admin.category.create') }}">Add New Category</a>
</p>

@if (session()->has('success'))
<div class="alert alert-success m-3 text-center" id="success" role="alert">
  {{ session()->get('success') }}
   </div>
@endif 

<div class="table-responsive">
 <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th scope="col">Category Name</th>
        <th scope="col">Total Post</th>
        <th scope="col">Created At</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->recipes->count() }}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
            
            
                <td>
                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info btn-block">Edit</a>
                </td>
                <td>
                    <button class="btn btn-danger btn-block" type="button" onclick="deleteCategory({{ $category->id }})">Delete</button>
                          
                    <form id="deleteCategory-{{ $category->id }}" action="{{ route('admin.category.destroy', $category->id) }}" 
                    method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                                            
                    </form>
                </td>

            </tr>
        @empty
            No Data Found
        @endforelse
    </tbody>
  </table>
  {{ $categories->links() }}
</div>
  
</div>
@endsection

<script>
    setTimeout(function() {
      $('#success').fadeOut('fast');
}, 5000);
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
       <script type="text/javascript">
       function deleteCategory(id){
           const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure to delete this?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('deleteCategory-'+id).submit();
                } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
                ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                )
               }
            })
       } 
       </script>





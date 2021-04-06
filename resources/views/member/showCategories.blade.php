@extends('layouts.backend.app')

@section('title', 'Category List')

@push('css')

@endpush


@section('content')

<div class="container">
    <h2>Category List</h2>

<br>




<div class="table-responsive">
 <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th scope="col">Category Name</th>
        <th scope="col">Total Post</th>
        <th scope="col">Created At</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $key => $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->recipes->count() }}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
            
            </tr>
        @empty
            No Category Found
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






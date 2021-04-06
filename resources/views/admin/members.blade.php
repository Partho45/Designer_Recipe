@extends('layouts.backend.app')

@section('title', 'Author List')

@push('css')
<style>
    
 </style> 
@endpush


@section('content')

<div class="container ">
    <h2>Member List</h2>

<br>

@if (session()->has('success'))
<div class="alert alert-success m-3 text-center" id="success" role="alert">
  {{ session()->get('success') }}
   </div>
@endif 

<div class="table-responsive"> 
 <table class="table table-dark  table-hover table-bordered text-center" >
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Member Since</th>
        <th scope="col">Contact</th>
        <th scope="col">Age</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->created_at->diffforhumans() }}</td>
                <td>{{ $member->contact }}</td>
                <td>{{ $member->age }}</td>
                <td>
                    <button class="btn btn-danger btn-block" type="button" onclick="deleteMember({{ $member->id }})">Delete</button>
                          
                    <form id="deleteMember-{{ $member->id }}" action="{{ route('admin.member.destroy', $member->id) }}" 
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
       function deleteMember(id){
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
                    document.getElementById('deleteMember-'+id).submit();
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





@extends('layouts.backend.app')

@section('title', 'Subscriber list')

@push('css')

@endpush


@section('content')

<div class="container">
    <h2>Subscriber List</h2>
<br>

<hr>
@if (session()->has('success'))
<div class="alert alert-success m-3 text-center" id="success" role="alert">
  {{ session()->get('success') }}
   </div>
@endif 


@if ($subscribers->count() > 0)
<div class="table-responsive">

    <table class="table table-dark  table-hover">
       <thead>
         <tr>
           <th scope="col">Email</th>
           <th scope="col">Subscriber Since</th>
           <th colspan="3">Action</th>
         </tr>
       </thead>
       <tbody>
           @forelse ($subscribers as $key => $subscriber)
               <tr>
                   <td>{{ $subscriber->email }}</td>
                   <td>{{ $subscriber->created_at->diffForHumans() }}</td>
               
                   <td>
                       <button class="btn btn-danger btn-sm" type="button" onclick="deleteSubscriber({{ $subscriber->id }})">Remove</button>
                             
                       <form id="deleteSubscriber-{{ $subscriber->id }}" action="{{ route('admin.subscriber.destroy', $subscriber->id) }}" 
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
@else
    <h2 class="bg-dark p-3 m-3 text-white">No Subscriber Found</h2>
@endif







  
</div>
@endsection


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
       <script type="text/javascript">
       function deleteSubscriber(id){
           const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure to remove this subscriber?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('deleteSubscriber-'+id).submit();
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





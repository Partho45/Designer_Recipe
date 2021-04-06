@extends('layouts.backend.app')

@section('title', 'profile-info')


@section('content')



@if (session()->has('success'))
<div class="alert alert-success m-3 text-center" id="success" role="alert">
  {{ session()->get('success') }}
   </div>
@endif 


<div class="row justify-content-center">
  <div class="col-md-6">
        <div class="card">
          <div class="card-header">
              <strong>Profile Info</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped  table-hover">
              <tr>
                <th>Name: </th>
                <td>{{ $user->name }}</td>
              </tr>
              <tr>
                <th>Email: </th>
                <td>{{ $user->email }}</td>
              </tr>
              <tr>
                <th>Contact: </th>
                <td>{{ $user->contact }}</td>
              </tr>
              <tr>
                <th>Age: </th>
                <td>{{ $user->age }}</td>
              </tr>
            </table>
          </div>
          <div class="card-footer">
            <a href="{{ route('admin.profile.edit') }}" class="btn btn-success">Edit</a>
            <a href="{{ URL::previous()  }}" class="btn btn-danger">Back</a>
          </div>
        </div>
  </div>
</div>


@endsection

<script>
    setTimeout(function() {
      $('#success').fadeOut('fast');
}, 5000);
</script>






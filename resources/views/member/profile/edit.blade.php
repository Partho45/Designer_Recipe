@extends('layouts.backend.app')

@section('title', 'profile-edit')




@section('content')


    
<div class="container">
    <h2 class="text-center" style="font-weight: 600;"> Edit Profile</h2>
<br>
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 card p-4">
            <form action="{{ route('member.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" placeholder="type here.." value="{{ old('name', $user->name) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input disabled id="email"  name="email" placeholder="type here.." value="{{ old('email', $user->email) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input id="contact" type="text" name="contact" placeholder="type here.." value="{{ old('contact', $user->contact) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input id="age"  name="age" placeholder="type here.." value="{{ old('age', $user->age) }}" class="form-control">
                </div>
        
        
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.profile') }}" class="btn btn-danger">Back</a>
            </form>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>

@endsection
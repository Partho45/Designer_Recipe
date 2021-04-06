@extends('layouts.backend.app')

@section('title', 'Dashboard')

<style>
    .icon{
        color: rgb(235, 227, 227) !important;
        font-size:55px !important;
        padding-bottom: 20px;
    }
    .col-md-3{
        background-color: rgb(44, 104, 24);
        height: 200px;
        padding: 20px;
        margin: 20px 40px;
        border-radius: 22px;
        transition: 800ms;
    }
    .number{
        color:azure;
    }
    .boxs{
        margin-top: 75px;
    }

    .col-md-3:hover{
        background: rgb(7, 5, 245);
    }
</style>


@section('content')

<div class="container">
    <div class="row text-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="name">Welcome to User Panel - <span style="padding: 6px;color:white;background:rgb(59, 136, 59);"> {{ Auth::user()->name }}</span></h1>  
        </div>
    </div>
    <div class="row text-center boxs">
        <div class="col-md-3 ">
                <i class="icon material-icons" >dashboard</i>
                <h3 class="number">Total Categories</h3>
                <h3 class="number">{{ $categories->count() }}</h3>
        </div>
        <div class="col-md-3">
            <i class="icon material-icons" >web</i>
            <h3 class="number">Your Designs</h3>
            <h3 class="number">{{ $recipes->count() }}</h3>
    </div>
    <div class="col-md-3">
        <i class="icon material-icons" >account_circle</i>
        <h3 class="number">Total Members</h3>
        <h3 class="number">{{ $members->count() }}</h3>
    </div>
    </div>
</div>
@endsection


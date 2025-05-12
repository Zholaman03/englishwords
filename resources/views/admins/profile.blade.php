@extends('layouts.adm')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
    </div>
    <div class="card">
        <div class="card-header">
            Admin Profile
        </div>
        <div class="card-body">
            @if(Auth::check())
            <h5 class="card-title">Welcome, {{ Auth::user()->name }}</h5>
            @endif
            <p class="card-text">This is your profile page. You can manage your account settings here.</p>
            <a href="#" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>

@endsection
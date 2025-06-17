@extends('layouts.user')

@section('content')

    <div class="container">
        <h2>Users List</h2>
        <ul class="list-group">
            @foreach($users as $user)
                @if($user->id !== auth()->id())
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $user->name }}
                        <a  class="btn btn-primary btn-sm">Chat</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
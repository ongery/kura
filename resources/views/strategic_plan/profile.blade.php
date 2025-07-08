@extends('layouts.strategic_app')

@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <h3 class="card-title">Our Profile</h3>
        <a href="/profile_form" class="btn btn-success float-right">Create Profile</a>

        @include('navbar.strategy_nav')


    </div>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body table-responsive p-4 text-center">
        <div class="avatar py-4">
            @foreach ($avatars as $row)
            <img src="{{ asset('storage/avatars/' . $row->avatar) }}" width="80" height="80px" class="img-circle">
            @endforeach
        </div>
        <hr>

        <h2>Vision</h2>
        @foreach ($visions as $vision)
        <p>{{ $vision->name }}</p>
        @endforeach
        <hr>

        <h2>Mission</h2>
        @foreach ($missions as $mission)
        <p>{{ $mission->name }}</p>
        @endforeach
        <hr>

        <h2>Core Values</h2>
        @foreach ($values as $value)
        <p>{{ $value->name }}</p>
        @endforeach
        <hr>
    </div>
</div>
@endsection

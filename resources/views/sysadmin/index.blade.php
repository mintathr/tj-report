@extends('desk-layout.main')
@section('title', 'Home Admin')
@section('subtitle', 'Home Admin')

@section('content')


<div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ __('You are logged in!') }}

        <br>
        nama admin = {{ Auth::user()->name }}
        <br>
        id = {{ Auth::user()->id }}
        <br>
        block = {{ Auth::user()->block }}
    </div>
</div>

@endsection
@extends('desk-layout.main')
@section('title', 'Home')
@section('subtitle', 'Home')

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
        nama = {{ Auth::user()->name }}
        <br>
        id = {{ Auth::user()->id }}
        <br>
        block = {{ Auth::user()->block }}
    </div>
</div>

@endsection
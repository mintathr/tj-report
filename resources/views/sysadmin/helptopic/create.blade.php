@extends('desk-layout.main')
@section('title', 'Tambah Parameter Help Topic')
@section('subtitle', 'Tambah Parameter Help Topic')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Help Topic</h3>
            </div>
            <form role="form" method="POST" action="{{ route('helptopic.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Topic</label>
                        <input type="text" name="topic_name" class="form-control @error('topic_name') is-invalid @enderror" id="" value="{{ old('topic_name') }}" placeholder="Masukkan Nama Topic">
                        @error('topic_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>



@endsection
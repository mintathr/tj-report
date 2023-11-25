@extends('desk-layout.main')
@section('title', 'Edit Parameter Brand')
@section('subtitle', 'Edit Parameter Brand')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Brand</h3>
            </div>
            <form role="form" method="POST" action="{{ route('brand.update', ['id' => $data->id]) }}">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Brand</label>
                        <input type="text" name="name" class="form-control" id="" value="{{ $data->name }}" placeholder="Masukkan Nama Brand">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>



@endsection
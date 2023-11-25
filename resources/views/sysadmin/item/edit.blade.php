@extends('desk-layout.main')
@section('title', 'Edit Parameter Item')
@section('subtitle', 'Edit Parameter Item')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Item</h3>
            </div>
            <form role="form" method="POST" action="{{ route('item.update', ['id' => $data->id]) }}">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Item</label>
                        <input type="text" name="name" class="form-control" id="" value="{{ $data->name }}" placeholder="Masukkan Nama Item">
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
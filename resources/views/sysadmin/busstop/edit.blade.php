@extends('desk-layout.main')
@section('title', 'Edit Parameter Halte')
@section('subtitle', 'Edit Parameter Halte')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Halte Busway</h3>
            </div>
            <form role="form" method="POST" action="{{ route('halte.update', ['id' => $data->id]) }}">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Halte</label>
                        <input type="text" name="nama_halte" class="form-control @error('nama_halte') is-invalid @enderror" id="" value="{{ $data->nama_halte }}" placeholder="Masukkan Nama Halte">
                        @error('nama_halte')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Koridor</label>
                        <input type="text" name="koridor" class="form-control @error('koridor') is-invalid @enderror" id="" oninput="this.value=this.value.replace(/[^0-9]/g,'');" min="1" maxlength="2" value="{{ $data->koridor }}" placeholder="Kosongkan Bila Halte Non BRT">
                        @error('koridor')
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
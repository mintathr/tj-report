@extends('desk-layout.main')
@section('title', 'Edit Asset')
@section('subtitle', 'Edit Asset')

@section('content')

@push('script-summer-note')
<link rel="stylesheet" href="/assets-template/summernote/summernote-bs4.css">
@endpush

<div class="row">
    <div class="col-md-6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Edit Asset 1 Billion</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.updateAsset', $asset->id) }}">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nomor Tiket</label>
                        <input type="text" name="" class="form-control @error('nomor_tiket') is-invalid @enderror" id="" value="{{ $asset->nomor_tiket }}" disabled>
                        @error('nomor_tiket')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Halte</label>
                        <select name="halte_id" class="form-control select2bs4 @error('halte_id') is-invalid @enderror" style="width: 100%;">
                            <option selected disabled>== Pilih Halte ==</option>
                            <option value="247">Non BRT</option>
                            @foreach ($busKoridor as $buskor => $busstops)

                            <optgroup label="Koridor {{ $buskor }}">
                                @foreach($busstops as $busstop)
                                <option value="{{ $busstop->id }}" {{ ($asset->halte_id === $busstop->id ? "selected":"") }}>{{ $busstop->nama_halte }}</option>
                                @endforeach
                            </optgroup>

                            @endforeach
                        </select>
                        @error('halte_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ $asset->nama_barang }}">
                        @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kondisi Barang</label>
                        <select name="kondisi" class="form-control select2bs4 @error('kondisi') is-invalid @enderror" style="width: 100%;">
                            <option selected disabled>== Pilih Kondisi Barang ==</option>
                            <option value="Rusak" {{ ($asset->kondisi === "Rusak" ? "selected":"") }}>Rusak</option>
                            <option value="Normal" {{ ($asset->kondisi === "Normal" ? "selected":"") }}>Normal</option>
                            <option value="Output Beda Tegangan" {{ ($asset->kondisi === "Output Beda Tegangan" ? "selected":"") }}>Output Beda Tegangan</option>
                        </select>
                        @error('kondisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Serial Number</label>
                        <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" value="{{ $asset->serial_number }}">
                        @error('serial_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control select2bs4 @error('status') is-invalid @enderror" style="width: 100%;">
                            <option selected disabled>== Pilih Status ==</option>
                            <option value="Barang ditarik ke kantor" {{ ($asset->status === "Barang ditarik ke kantor" ? "selected":"") }}>Barang ditarik ke kantor</option>
                            <option value="Sudah terpasang" {{ ($asset->status === "Sudah terpasang" ? "selected":"") }}>Sudah terpasang</option>
                            <option value="Pengembalian barang/ replace" {{ ($asset->status === "Pengembalian barang/ replace" ? "selected":"") }}>Pengembalian barang/ replace</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>NIK Petugas Halte</label>
                        <input type="text" name="nik_petugas_halte" class="form-control @error('nik_petugas_halte') is-invalid @enderror" oninput="this.value=this.value.replace(/[^0-9]/g,'');" min="6" maxlength="6" value="{{ $asset->nik_petugas_halte }}">
                        @error('nik_petugas_halte')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Nama Petugas Halte</label>
                        <input type="text" name="nama_petugas_halte" class="form-control @error('nama_petugas_halte') is-invalid @enderror" value="{{ $asset->nama_petugas_halte }}">
                        @error('nama_petugas_halte')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <button onclick="window.location.href='{{ url()->previous() }}';" type="button" class="btn btn-default float-right">Back</button>

                </div>
            </form>
        </div>
    </div>
</div>


@push('script-select2')
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>
@endpush


@endsection
@extends('desk-layout.main')
@section('title', 'Create Asset')
@section('subtitle', 'Create Asset')

@section('content')
@push('css-filepond')
<link href="/assets-template/filepond/filepond.css" rel="stylesheet" />

@endpush

@push('script-summer-note')
<link rel="stylesheet" href="/assets-template/summernote/summernote-bs4.css">
@endpush

<div class="row">
    <div class="col-md-6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Asset 1 Billion</h3>
            </div>
            <form role="form" method="POST" action="{{ route('createAsset') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="customFile">Upload Photo Problem </label>
                        <input type="file" name="fileImage" class="filepond @error('fileImage') is-invalid @enderror" name="fileImage" id="fileImage" multiple data-max-file-size="3MB" data-max-files="2">
                        @error('fileImage')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nomor Tiket</label>
                        <input type="text" name="nomor_tiket" class="form-control @error('nomor_tiket') is-invalid @enderror" id="" oninput="this.value=this.value.replace(/[^0-9]/g,'');" min="10" maxlength="10" value="{{ old('nomor_tiket') }}" placeholder="Masukkan Nomor Tiket">
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
                                <option value="{{ $busstop->id }}" {{ (old("halte_id") == $busstop->id ? "selected":"") }}>{{ $busstop->nama_halte }}</option>
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
                        <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" placeholder="Nama Barang">
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
                            <option value="Rusak">Rusak</option>
                            <option value="Normal">Normal</option>
                            <option value="Output Beda Tegangan">Output Beda Tegangan</option>
                        </select>
                        @error('kondisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Serial Number</label>
                        <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" value="{{ old('serial_number') }}" placeholder="Serial Number">
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
                            <option value="Barang ditarik ke kantor">Barang ditarik ke kantor</option>
                            <option value="Sudah terpasang">Sudah terpasang</option>
                            <option value="Pengembalian barang/ replace">Pengembalian barang/ replace</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>NIK Petugas Halte</label>
                        <input type="text" name="nik_petugas_halte" class="form-control @error('nik_petugas_halte') is-invalid @enderror" oninput="this.value=this.value.replace(/[^0-9]/g,'');" min="6" maxlength="6" value="{{ old('nik_petugas_halte') }}" placeholder="NIK Petugas Halte">
                        @error('nik_petugas_halte')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Nama Petugas Halte</label>
                        <input type="text" name="nama_petugas_halte" class="form-control @error('nama_petugas_halte') is-invalid @enderror" value="{{ old('nama_petugas_halte') }}" placeholder="Nama Petugas Halte">
                        @error('nama_petugas_halte')
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

@push('script-filepond')
<script src="{{ url('assets-template/filepond/filepond.js') }}"></script>
<script src="{{ url('assets-template/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ url('assets-template/filepond/filepond-plugin-file-validate-size.min.js') }}"></script>

<script>
    // Register the plugin (max size yg diijinkan)
    FilePond.registerPlugin(FilePondPluginFileValidateSize);

    // validate type file
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="fileImage"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        allowFileSizeValidation: true,
        maxFileSize: "3MB",
        acceptedFileTypes: [
            'image/jpeg',
            'image/png',
        ],

        server: {
            /*url: '/upload',*/
            process: {
                url: `{{ route('uploadAsset') }}`,
            },
            /* process: '/process', */
            revert: {
                url: `{{ route('filepond.asset.delete') }}`,
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',

            }

        }

    });
</script>
@endpush



@endsection
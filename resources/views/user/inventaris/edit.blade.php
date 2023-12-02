@extends('desk-layout.main')
@section('title', 'Edit Parameter Inventaris')
@section('subtitle', 'Edit Parameter Inventaris')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Inventaris</h3>
            </div>
            <form role="form" method="POST" action="{{ route('inventaris.update', ['id' => $data->id]) }}">
                @method('patch')
                @csrf
                <div class="card-body">
                    
                    <div class="form-group">
                        <label>Brand</label>
                        <select name="brand_id" class="form-control select2bs4 @error('brand_id') is-invalid @enderror" style="width: 100%;">
                            <option selected disabled>== Pilih Brand ==</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ ($data->brand_id == $brand->id) ? "selected":"" }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Serial Number</label>
                        <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" id="" value="{{ $data->serial_number }}" placeholder="Masukkan Serial number">
                        @error('serial_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Berfungsi" {{ ($data->status == "Berfungsi") ? "checked" : "" }} checked>
                            <label class="form-check-label">Berfungsi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Tidak Normal" {{ ($data->status == "Tidak Normal") ? "checked" : "" }}>
                            <label class="form-check-label">Tidak Normal</label>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
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
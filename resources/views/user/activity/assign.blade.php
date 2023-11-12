@extends('desk-layout.main')
@section('title', 'Assign User')
@section('subtitle', 'Assign User')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Pindahkan Tiket ke User Lain</h3>
            </div>
            <form role="form" method="POST" action="{{ route('updateAssign', $activity->nomor_tiket) }}">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nomor Tiket</label>
                        <input type="text" name="" class="form-control" value="{{ $activity->nomor_tiket }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <select name="user_id" class="form-control select2bs4 @error('user_id') is-invalid @enderror" style="width: 100%;">
                            <option selected disabled>== Pilih NIK ==</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->user_id }}" {{ ($user->user_id == $activity->user_id) ? 'disabled' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary">Submit</button>
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
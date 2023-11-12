@extends('desk-layout.main')
@section('title', 'Edit User')
@section('subtitle', 'Edit User')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Edit User (Login)</h3>
            </div>
            <form role="form" method="POST" action="{{ route('user.update', $user->user_id) }}">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="" class="form-control @error('user_id') is-invalid @enderror" value="{{ $user->user_id }}" disabled>
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Group</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="role" class="custom-control-input" value="user" {{ ($user->role == "user") ? "checked" : "" }}>
                            <label class="custom-control-label" for="customRadio1">User</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="role" class="custom-control-input" value="admin" {{ ($user->role == "admin") ? "checked" : "" }}>
                            <label class="custom-control-label" for="customRadio2">Admin</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="role" class="custom-control-input" value="superadmin" {{ ($user->role == "superadmin") ? "checked" : "" }}>
                            <label class="custom-control-label" for="customRadio3">Super Admin</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button onclick="window.location.href='{{ route("user") }}';" type="button" class="btn btn-default float-right">Back</button>
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

    })
</script>
@endpush

@endsection
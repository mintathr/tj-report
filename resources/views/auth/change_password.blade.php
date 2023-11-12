@extends('desk-layout.main')
@section('title', 'Change Password')
@section('subtitle', 'Change Password')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Change Password</h3>
            </div>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form role="form" method="POST" action="{{ route('changePassword') }}">
                @csrf
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input id="password-field" type="password" name="password" class="form-control @error('password') is-invalid @enderror" oninput="this.value=this.value.replace(/[^A-Za-z0-9~`!@#$%^&*()_+={}|;:<>,.?/]/g,'');" placeholder="New Password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span toggle="#password-field" class="fas fa-eye  toggle-password"></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="password_confirm" type="password" name="password_confirmation" class="form-control" oninput="this.value=this.value.replace(/[^A-Za-z0-9~`!@#$%^&*()_+={}|;:<>,.?/]/g,'');" placeholder="New Password Confirm">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span toggle="#password_confirm" class="fas fa-eye  password_confirm"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script-changepassw')
<script type="text/javascript">
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

<script type="text/javascript">
    $(".password_confirm").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
@endpush

@endsection
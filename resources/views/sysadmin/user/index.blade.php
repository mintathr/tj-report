@extends('desk-layout.main')
@section('title', 'Tabel User')
@section('subtitle', 'Tabel User')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Tabel User Login</h3>
        <div class="card-tools">
            <button onclick="window.location.href='{{ route("user.create") }}';" type="button" class="btn btn-tool" data-card-widget="collapse1" data-toggle="tooltip" title="Tambah User">
                <i class="fas fa-plus"></i> User
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px;">NO</th>
                        <th>NIK</th>
                        <th>NAMA</th>
                        <th>ROLE</th>
                        <th>STATUS</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td>{{ sprintf("%06d", $user->user_id) }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if($user->trashed())
                            <span class="badge badge-secondary"> Non Aktif</span>
                            @else
                            @if($user->block <3) <span class="badge badge-success"> Aktif</span>
                                @else
                                <span class="badge badge-danger"> Terblokir</span>
                                @endif
                                @endif
                        </td>
                        <td>
                            @if($user->trashed())
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#softdelete-modal{{ $user->id }}"><i class="fa fa-unlock-alt"></i> Restore
                            </button>

                            <div class="modal fade" id="softdelete-modal{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-center font-18">
                                            <h4 class="padding-top-30 mb-30 weight-500">Anda yakin user diaktifkan?</h4>
                                            <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                    Tidak
                                                </div>
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" onclick="window.location.href='{{ route("user.restore", $user->id) }}';"><i class="fa fa-check"></i></button>


                                                    Ya
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @else

                            <div class="btn-group">
                                <form method="post" action="{{ route('user.reset', $user->id) }}">
                                    @csrf
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#confirmation-modal{{ $user->id }}"><i class="fa fa-key"></i> Reset

                                    </button>

                                    <div class="modal fade" id="confirmation-modal{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body text-center font-18">
                                                    <h4 class="padding-top-30 mb-30 weight-500">Anda yakin Reset Password?</h4>
                                                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                                                        <div class="col-6">
                                                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                            Tidak
                                                        </div>
                                                        <div class="col-6">
                                                            <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                                                            Ya
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                @if($user->block >2)
                                <div class="btn-group">
                                    <form method="post" action="{{ route('user.unblock', $user->id) }}">
                                        @csrf
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#unblock-modal{{ $user->id }}"><i class="fa fa-unlock"></i> Unblock

                                        </button>

                                        <div class="modal fade" id="unblock-modal{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center font-18">
                                                        <h4 class="padding-top-30 mb-30 weight-500">Anda yakin unblock user?</h4>
                                                        <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                                                            <div class="col-6">
                                                                <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                                Tidak
                                                            </div>
                                                            <div class="col-6">
                                                                <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                                                                Ya
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endif

                                    <form method="post" action="{{ route('user.delete', $user->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#trace-modal{{ $user->id }}"><i class="far fa-trash-alt"></i> NonAktif
                                        </button>

                                        <div class="modal fade" id="trace-modal{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center font-18">
                                                        <h4 class="padding-top-30 mb-30 weight-500">Anda yakin user di non aktifkan?</h4>
                                                        <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                                                            <div class="col-6">
                                                                <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                                Tidak
                                                            </div>
                                                            <div class="col-6">
                                                                <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                                                                Ya
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <a href="{{ route('user.edit', $user->user_id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                </div>

                                @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
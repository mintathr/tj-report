@extends('desk-layout.main')
@section('title', 'Parameter Halte')
@section('subtitle', 'Parameter Halte')

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Tabel Halte Busway</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">NO</th>
                                <th style="width: 20px;">Koridor</th>
                                <th>Nama Halte</th>
                                <th>status</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($busstops as $busstop)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{ $busstop->koridor == 99 ? 'Non BRT' : sprintf("%02d", $busstop->koridor) }}</td>
                                <td>
                                    @if($busstop->trashed())
                                    <span class="badge badge-secondary"> disable</span>
                                    @else
                                    <span class="badge badge-success"> enable</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('halte.edit', [Crypt::encryptString($busstop->id)]) }}"
                                            class="btn btn-info">Edit</a>
                                        @if($user->trashed())
                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                            data-target="#softdelete-modal{{ $busstop->id }}"><i
                                                class="fa fa-unlock-alt"></i> Restore
                                        </button>

                                        <div class="modal fade" id="softdelete-modal{{ $busstop->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center font-18">
                                                        <h4 class="padding-top-30 mb-30 weight-500">Anda yakin halte
                                                            diaktifkan?</h4>
                                                        <div class="padding-bottom-30 row"
                                                            style="max-width: 170px; margin: 0 auto;">
                                                            <div class="col-6">
                                                                <button type="button"
                                                                    class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                                                    data-dismiss="modal"><i
                                                                        class="fa fa-times"></i></button>
                                                                Tidak
                                                            </div>
                                                            <div class="col-6">
                                                                <button type="button"
                                                                    class="btn btn-primary border-radius-100 btn-block confirmation-btn"
                                                                    onclick="window.location.href='{{ route("
                                                                    halte.restore", $busstop->id) }}';"><i
                                                                        class="fa fa-check"></i></button>
                                                                Ya
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
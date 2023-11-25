@extends('desk-layout.main')
@section('title', 'Parameter Help Topics')
@section('subtitle', 'Parameter Help Topics')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Tabel Help Topics</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">NO</th>
                                <th>Topics</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($helptopics as $helptopic)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{ $helptopic->topic_name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('helptopic.edit', [Crypt::encryptString($helptopic->id)]) }}" class="btn btn-info btn-sm">Edit</a>
                                        @if($helptopic->trashed())
                                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                                data-target="#softdelete-modal{{ $helptopic->id }}">Restore
                                            </button>

                                            <div class="modal fade" id="softdelete-modal{{ $helptopic->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center font-18">
                                                            <h4 class="padding-top-30 mb-30 weight-500">Anda yakin nama topic
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
                                                                        onclick="window.location.href='{{ route("helptopic.restore", [$helptopic->id]) }}';"><i class="fa fa-unlock"></i></button>
                                                                    Ya
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#softdelete-modal{{ $helptopic->id }}">Delete
                                            </button>

                                            <div class="modal fade" id="softdelete-modal{{ $helptopic->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center font-18">
                                                            <h4 class="padding-top-30 mb-30 weight-500">Anda yakin nama topic
                                                                di non aktifkan?</h4>
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
                                                                        onclick="window.location.href='{{ route("helptopic.delete", [$helptopic->id]) }}';"><i class="fa fa-lock"></i></button>
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
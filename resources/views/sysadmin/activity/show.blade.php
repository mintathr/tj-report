@extends('desk-layout.main')
@section('title', 'Detail Activity')
@section('subtitle', 'Detail Activity')

@section('content')
<div class="row">
    <div class="col-md-7 col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tiket No {{ $activity->nomor_tiket }}</h3>
            </div>
            <div class="card-body">
                <strong>
                    <i class="fas fa-user mr-1"></i> Nama
                </strong>
                <p class="text-muted">
                    {{ $activity->user->name }}
                </p>

                <hr>
                <strong>
                    <i class="fas fa-clock mr-1"></i> Jam Awal &nbsp; <i class="fa fa-long-arrow-alt-right"></i> &nbsp; Jam Akhir
                </strong>
                <p class="text-muted">
                    {{ $activity->created_at->format('H:i:s') }} &nbsp; <i class="fa fa-long-arrow-alt-right"></i> &nbsp; {{ $activity->updated_at->format('H:i:s') }}
                </p>

                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Halte Awal &nbsp; <i class="fa fa-long-arrow-alt-right"></i> &nbsp; Halte Akhir</strong>
                <p class="text-muted">(Koridor {{ $activity->busstopAwal->koridor }}) - {{ $activity->busstopAwal->nama_halte }} &nbsp; <i class="fa fa-long-arrow-alt-right"></i> &nbsp; (Koridor {{ $activity->busstopAkhir->koridor }}) - {{ $activity->busstopAkhir->nama_halte }}</p>

                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Problem</strong>
                <p class="text-muted">
                    {{ $activity->problem }}
                </p>

                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                <p class="text-muted">{{ $activity->root_cause }}</p>

                <hr>
                <strong><i class="far fa-file mr-1"></i> Help Topic</strong>
                <p class="text-muted">{{ $activity->helpTopic->topic_name }}</p>

                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Action</strong>
                <p class="text-muted">
                    @if(is_null($activity->action))
                    <span class="badge badge-secondary">no action</span>
                    @else
                    {{ $activity->action }}
                    @endif
                </p>

                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Status</strong>
                <p class="text-muted">
                    @if($activity->status == 'Open')
                <h5><span class="badge badge-danger">Open</span></h5>
                @elseif($activity->status == 'Close')
                <h5><span class="badge badge-success">Close</span></h5>
                @elseif(is_null($activity->status))
                <h5><span class="badge badge-warning">On Progress</span></h5>
                @endif
                </p>

                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Assign To</strong>
                <p class="text-muted">
                    @if(is_null($activity->assign_to))
                    -
                    @else
                    {{ $activity->assign_to }}
                    @endif
                </p>
            </div>

            <div class="card-footer">
                <button onclick="window.location.href='{{ url()->previous() }}';" type="button" class="btn btn-default float-right">Back</button>
            </div>
        </div>
    </div>

    <div class="col-md-5 col-sm-6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Upload Image</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                    @foreach($imgFiles as $imgFile)
                    <tr>
                        <td>{{ $imgFile->filename }}</td>
                        <td>{{ $imgFile->status_poto }}</td>
                        <td>
                            <a href="D/{{ $imgFile->filename }}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Download">
                                <i class="fas fa-download"></i>
                        </td>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    @endsection
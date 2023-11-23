@extends('desk-layout.main')
@section('title', 'Daily Activity')
@section('subtitle', 'Daily Activity')

@section('content')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">List Daily Activity <small><i>* (ditampilkan hari ini dan hari kemarin)</i></small></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- <table class="table projects"> -->
                <!-- <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap"> -->
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 1%">No</th>
                                <th>Tanggal</th>
                                <th>Halte</th>
                                <th>Nomor Tiket</th>
                                <th>Help Topic</th>
                                <th>Nama</th>
                                <th>Problem</th>
                                <th>Root Cause</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>Assign To</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $activity->created_at->toDateString() }}
                                    <br />
                                    <small>
                                        {{ $activity->created_at->diffForHumans() }}
                                    </small>
                                </td>
                                <td>{{ $activity->busstopAkhir->koridor == 99 ? 'Non BRT' : '(Koridor '. $activity->busstopAkhir->koridor .')' }} - {{ $activity->busstopAkhir->nama_halte }}</td>
                                <td>{{ $activity->nomor_tiket }}</td>
                                <td>{{ $activity->helpTopic->topic_name }}</td>
                                <td>{{ $activity->user_id }}
                                    <br />
                                    <small>
                                        {{ $activity->user->name }}
                                    </small>
                                </td>
                                <td>Koridor {{ $activity->problem }}</td>
                                <td>Koridor {{ $activity->root_cause }}</td>
                                <td>Koridor {{ $activity->action }}</td>
                                <td>
                                    @if($activity->status == 'Open')
                                    <h5><span class="badge badge-danger">Open</span></h5>
                                    @elseif($activity->status == 'Close')
                                    <h5><span class="badge badge-success">Close</span></h5>
                                    @elseif(is_null($activity->status))
                                    <h5><span class="badge badge-warning">On Progress</span></h5>
                                    @endif
                                </td>
                                <td>Koridor {{ $activity->assign_to }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.showActivity', $activity->nomor_tiket) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                                        
                                        @if(Auth::user()->role === 'superadmin' OR Auth::user()->role === 'saradm')
                                            <a href="{{ route('admin.editActivity', $activity->nomor_tiket) }}" class="btn btn-secondary btn-xs"><i class="fa fa-edit"></i> Edit</a>
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
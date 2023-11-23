@extends('desk-layout.main')
@section('title', 'Search')
@section('subtitle', 'Search')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Periode Tanggal Penginputan</h3>
            </div>
            <form role="form" method="GET" action="{{ route('searchActivity') }}">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tanggal Pencarian</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="date_range" class="form-control float-right" id="reservation">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(isset($activities) > 0)
<div class="card">

    <!-- <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
    </div> -->
    <div class="card-body">
        <div class="alert alert-info" role="alert">
            Periode Pencarian Dari Tanggal {{ $tgl_awal }} s.d Tanggal {{ $tgl_akhir }}
        </div>
        <table id="example1" class="table table-bordered display nowrap" style="width:100%">
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

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <div class="card-footer">
        <a class="btn btn-success" href="../export-report-search/{{ $range }}" role="button"><i class="fas fa-file-excel"></i> Export Excel</a>
    </div>
</div>
@endif

@endsection
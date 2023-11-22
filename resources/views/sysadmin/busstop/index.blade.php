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
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($busstops as $busstop)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{ $busstop->koridor == 99 ? 'Non BRT' : sprintf("%02d", $busstop->koridor) }}</td>
                                <td>{{ $busstop->nama_halte }}</td>
                                <td>
                                    <a href="{{ route('halte.edit', [Crypt::encryptString($busstop->id)]) }}" class="btn btn-info">Edit</a>
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
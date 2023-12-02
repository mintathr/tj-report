@extends('desk-layout.main')
@section('title', 'Data Inventaris')
@section('subtitle', 'Data Inventaris')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Inventaris</h3>
                <div class="card-tools">
                    <a href="{{ route('inventaris.excel') }}" class="btn btn-sm btn-tool" data-toggle="tooltip" title="Export Excel">
                        <i class="fas fa-file-excel" style="font-size:24px;color:seagreen"></i>
                    </a>
        </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">NO</th>
                                <th>Nama Halte</th>
                                <th>Nama Barang</th>
                                <th>Merk</th>
                                <th>SN</th>
                                <th>Status</th>
                                <th>Petugas</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventaris as $inventory)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{ $inventory->halteId->nama_halte }}</td>
                                <td>{{ $inventory->item->name }}</td>
                                <td>{{ $inventory->brand->name }}</td>
                                <td>{{ $inventory->serial_number }}</td>
                                <td>{{ $inventory->status }}</td>
                                <td>{{ $inventory->user->name }}</td>
                                <td>
                                <a href="{{ route('inventaris.edit', [Crypt::encryptString($inventory->id)]) }}" class="btn btn-info btn-sm">Edit</a>
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
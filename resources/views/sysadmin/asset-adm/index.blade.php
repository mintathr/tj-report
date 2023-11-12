@extends('desk-layout.main')
@section('title', 'Asset')
@section('subtitle', 'Asset')

@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Tabel Asset 1 Billion</h3>
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
                                <th>Tanggal Buat</th>
                                <th>Nomor Tiket</th>
                                <th>NIK</th>
                                <th>Halte</th>
                                <th>Nama Barang</th>
                                <th>Serial Number</th>
                                <th>Kondisi</th>
                                <th>Status</th>
                                <th>Nama Petugas Halte</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assets as $asset)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $asset->created_at->toDateString() }}
                                </td>
                                <td>{{ $asset->nomor_tiket }}</td>
                                <td>{{ $asset->user_id }}
                                    <br />
                                    <small>
                                        {{ $asset->user->name }}
                                    </small>
                                </td>
                                <td>(Koridor {{ $asset->halteId->koridor }}) - {{ $asset->halteId->nama_halte }}</td>
                                <td>{{ $asset->nama_barang }}</td>
                                <td>{{ $asset->serial_number }}</td>
                                <td>{{ $asset->kondisi }}</td>
                                <td>
                                    @if($asset->status == 'Barang ditarik ke kantor')
                                    <h5><span class="badge badge-info">Barang ditarik ke kantor</span></h5>
                                    @elseif($asset->status == 'Sudah terpasang')
                                    <h5><span class="badge badge-success">Sudah terpasang</span></h5>
                                    @elseif($asset->status == 'Pengembalian barang/ replace')
                                    <h5><span class="badge badge-danger">Pengembalian barang/ replace</span></h5>
                                    @endif
                                </td>
                                <td>{{ $asset->nama_petugas_halte }}
                                    <br />
                                    <small>
                                        {{ $asset->nik_petugas_halte }}
                                    </small>
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.showAsset', $asset->id) }}" class="btn btn-primary btn-sm"> View</a>
                                        
                                        @if(Auth::user()->role === 'superadmin' OR Auth::user()->role === 'saradm')
                                            <a href="{{ route('admin.editAsset', $asset->id) }}" class="btn btn-secondary btn-sm"> Edit</a>
                                        @endif
                                        
                                        <form method="post" action="{{ route('admin.deleteAsset', $asset->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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
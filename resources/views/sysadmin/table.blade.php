@extends('desk-layout.main')
@section('title', 'List Ticketing')
@section('subtitle', 'List Ticketing')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header card-title">
                <h3 class="card-title">Report Ticketing </h3>
            </div>
            <form action="#" method="get" id="">
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode Tanggal</label>
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
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a class="btn btn-success" href="" role="button"><i class="fas fa-file-excel"></i> Export Excel</a>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable Ticketing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                    <!-- <table class="table no-margin table-striped table-bordered" id="example2" class="display"
                  style="width:100%"> -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Koridor</th>
                            <th>Nomor Tiket</th>
                            <th>Lokasi Awal</th>
                            <th>Lokasi Tujuan</th>
                            <th>Problem</th>
                            <th>Root Cause</th>
                            <th>Help Topic</th>
                            <th>Action</th>
                            <th>Lama Perbaikan</th>
                            <th>Status</th>
                            <th>Assign to</th>
                            <th>Tanggal</th>
                            <th>Engineer</th>
                            <th>Image</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>4125135810</td>
                            <td>Blok M</td>
                            <td>Mampang</td>
                            <td>Gate 3 Reader out mati</td>
                            <td>adaptor reader smart</td>
                            <td>eTiketing / adaptor smartcard</td>
                            <td>pengecekan adaptor reader,perbaikan / pengencangan socket dc adaptor yg kendor dengan disolasi,tap out& tap in.hasil normal</td>
                            <td>10 menit</td>
                            <td>
                                <span class="badge badge-danger">Open</span>
                            </td>
                            <td></td>
                            <td>2022-01-01</td>
                            <td>AHMAD ZAMRONI</td>
                            <td><img src="/assets-template/img/default1.png"></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>1</td>
                            <td>4125135810</td>
                            <td>Blok M</td>
                            <td>Mampang</td>
                            <td>Gate 3 Reader out mati</td>
                            <td>adaptor reader smart</td>
                            <td>eTiketing / adaptor smartcard</td>
                            <td>pengecekan adaptor reader,perbaikan / pengencangan socket dc adaptor yg kendor dengan disolasi,tap out& tap in.hasil normal</td>
                            <td>10 menit</td>
                            <td>
                                <span class="badge badge-warning">on progress</span>
                            </td>
                            <td></td>
                            <td>2022-01-01</td>
                            <td>AHMAD ZAMRONI</td>
                            <td><img src="/assets-template/img/default1.png"></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>1</td>
                            <td>4125135810</td>
                            <td>Blok M</td>
                            <td>Mampang</td>
                            <td>Gate 3 Reader out mati</td>
                            <td>adaptor reader smart</td>
                            <td>eTiketing / adaptor smartcard</td>
                            <td>pengecekan adaptor reader,perbaikan / pengencangan socket dc adaptor yg kendor dengan disolasi,tap out& tap in.hasil normal</td>
                            <td>10 menit</td>
                            <td>
                                <span class="badge badge-success">Close</span>
                            </td>
                            <td></td>
                            <td>2022-01-01</td>
                            <td>AHMAD ZAMRONI</td>
                            <td><img src="/assets-template/img/default1.png"></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td>1</td>
                            <td>4125135810</td>
                            <td>Blok M</td>
                            <td>Mampang</td>
                            <td>Gate 3 Reader out mati</td>
                            <td>adaptor reader smart</td>
                            <td>eTiketing / adaptor smartcard</td>
                            <td>pengecekan adaptor reader,perbaikan / pengencangan socket dc adaptor yg kendor dengan disolasi,tap out& tap in.hasil normal</td>
                            <td>10 menit</td>
                            <td>
                                <span class="badge badge-success">Close</span>
                            </td>
                            <td></td>
                            <td>2022-01-01</td>
                            <td>AHMAD ZAMRONI</td>
                            <td><img src="/assets-template/img/default1.png"></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td>1</td>
                            <td>4125135810</td>
                            <td>Blok M</td>
                            <td>Mampang</td>
                            <td>Gate 3 Reader out mati</td>
                            <td>adaptor reader smart</td>
                            <td>eTiketing / adaptor smartcard</td>
                            <td>pengecekan adaptor reader,perbaikan / pengencangan socket dc adaptor yg kendor dengan disolasi,tap out& tap in.hasil normal</td>
                            <td>10 menit</td>
                            <td>
                                <span class="badge badge-success">Close</span>
                            </td>
                            <td></td>
                            <td>2022-01-01</td>
                            <td>AHMAD ZAMRONI</td>
                            <td><img src="/assets-template/img/default1.png"></td>
                        </tr>


                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<script>
    $('#reservation').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        }
    })

    $('.date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    })
</script>

@endsection
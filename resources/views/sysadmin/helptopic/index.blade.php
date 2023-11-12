@extends('desk-layout.main')
@section('title', 'Parameter Help Topics')
@section('subtitle', 'Parameter Help Topics')

@section('content')
<div class="row">
    <div class="col-md-6">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($helptopics as $helptopic)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{ $helptopic->topic_name }}</td>
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
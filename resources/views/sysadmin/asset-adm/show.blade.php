@extends('desk-layout.main')
@section('title', 'Show Img Asset')
@section('subtitle', 'Show Img Asset')

@section('content')
<div class="row">
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
                            <a href="D/{{ $imgFile->filename }}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i>
                        </td>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    @endsection
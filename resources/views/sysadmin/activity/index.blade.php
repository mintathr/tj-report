@extends('desk-layout.main')

@section('title', 'Home')

@section('subtitle', 'Home')



@section('content')



<div class="row">

    <div class="col-lg-3 col-6">

        <!-- small box -->

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $count_status_close }}</h3>

                <p>Status Close</p>

            </div>

            <div class="icon">

                <i class="ion ion-android-checkbox-outline"></i>

            </div>

            <a href="#" class="small-box-footer"><i>*perhitungan selama 1 bulan</i> <!-- <i class="fas fa-arrow-circle-right"></i> --></a>

        </div>

    </div>



    <div class="col-lg-3 col-6">

        <!-- small box -->

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ $count_status_open }}</h3>

                <p>Status Open</p>

            </div>

            <div class="icon">

                <i class="ion ion-android-people"></i>

            </div>

            <a href="#" class="small-box-footer"><i>*perhitungan selama 1 bulan</i> <!-- <i class="fas fa-arrow-circle-right"></i> --></a>

        </div>

    </div>



    <div class="col-lg-3 col-6">

        <!-- small box -->

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ $count_status_progress }}</h3>



                <p>On Progress</p>

            </div>

            <div class="icon">

                <i class="ion ion-clipboard"></i>

            </div>

            <a href="#" class="small-box-footer"><i>*perhitungan selama 1 bulan</i> <!-- <i class="fas fa-arrow-circle-right"></i> --></a>

        </div>

    </div>

</div>



<p></p>

<h5 class="mb-2">Info Activity <i>* (status close tidak ditampilkan)</h5>

<!-- <div class="row">

    <div class="col-md-3 col-sm-6 col-12">

        <input class="form-control" id="myInput" type="text" placeholder="Cari No Tiket..">

    </div>

</div> -->

<br>



<div class="row">

    @foreach($activities as $activity)

    @if($activity->status == 'Open')

    <div class="col-md-4 col-sm-6 col-12">

        <div class="info-box">

            <span class="info-box-icon bg-danger"><i class="ion ion-android-people"></i></span>

            @if($activity->user_id == Auth::user()->user_id)

            <a href="{{ route('activity.user.edit',$activity->nomor_tiket) }}" style="color: black">

                @else

                <a href="#" style="color: black">

                    @endif

                    <div class=" info-box-content">

                        <span class="info-box-text">{{ $activity->busstopAkhir->nama_halte }}</span>
                        <span class="info-box-text">{{ $activity->user->name }}</span>

                        <span class="info-box-number">{{ $activity->nomor_tiket }}</span>

                        <a href="{{ route('activity.user.assign',$activity->nomor_tiket) }}" style="color: black">
                            <span class="info-box-text"><i style="color:red">status open <i class="fas fa-user"></i></i></span>
                        </a>

                    </div>

                </a>

        </div>

    </div>



    @elseif($activity->status == 'Close')

    <div class="col-md-4 col-sm-6 col-12">

        <div class="info-box">

            <span class="info-box-icon bg-success"><i class="ion ion-android-checkbox-outline"></i></span>

            <a href="#" style="color: black">

                <div class=" info-box-content">

                    <span class="info-box-text">{{ $activity->busstopAkhir->nama_halte }}</span>
                    <span class="info-box-text">{{ $activity->user->name }}</span>

                    <span class="info-box-number">{{ $activity->nomor_tiket }}</span>

                    <span class="info-box-text">status close</span>

                </div>

            </a>

        </div>

    </div>



    @else

    <div class="col-md-4 col-sm-6 col-12">

        <div class="info-box">

            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

            <a href="{{ route('activity.user.edit',$activity->nomor_tiket) }}" style="color: black">

                <div class="info-box-content">

                    <span class="info-box-text">{{ $activity->busstopAkhir->nama_halte }}</span>
                    <span class="info-box-text">{{ $activity->user->name }}</span>

                    <span class="info-box-number">{{ $activity->nomor_tiket }}</span>

                    <span class="info-box-text"><i style="color:red">on progress <i class="fas fa-arrow-circle-right"></i></i></span>

                </div>

            </a>

        </div>

    </div>

    @endif



    @endforeach

</div>









@endsection
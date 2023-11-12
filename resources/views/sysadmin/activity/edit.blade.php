@extends('desk-layout.main')

@section('title', 'Edit Daily Activity')

@section('subtitle', 'Edit Daily Activity')



@section('content')





@push('script-summer-note')

<link rel="stylesheet" href="/assets-template/summernote/summernote-bs4.css">

@endpush



<div class="row">

    <div class="col-md-6">

        <div class="card card-info">

            <div class="card-header">

                <h3 class="card-title">Edit Daily Report West</h3>

            </div>

            <form role="form" method="POST" action="{{ route('admin.updateActivity', $activity->nomor_tiket) }}">

                @csrf

                @method('patch')

                <div class="card-body">

                    <div class="form-group">

                        <label>Nomor Tiket</label>

                        <input type="text" name="nomor_tiket" class="form-control" value="{{ $activity->nomor_tiket }}">

                    </div>

                    <div class="form-group">

                        <label>Lokasi Awal</label>

                        <select name="halte_awal_id" class="form-control select2bs4 @error('halte_awal_id') is-invalid @enderror" style="width: 100%;">

                            <option selected disabled>== Pilih Halte Awal ==</option>

                            @foreach ($busKoridor as $buskor => $busstops)



                            <optgroup label="Koridor {{ $buskor }}">

                                @foreach($busstops as $busstop)

                                <option value="{{ $busstop->id }}" {{ ($activity->halte_awal_id === $busstop->id ? "selected":"") }}>{{ $busstop->nama_halte }}</option>

                                @endforeach

                            </optgroup>



                            @endforeach

                        </select>

                        @error('halte_awal_id')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>



                    <div class="form-group">

                        <label>Lokasi Tujuan</label>

                        <select name="halte_akhir_id" class="form-control select2bs4 @error('halte_akhir_id') is-invalid @enderror" style="width: 100%;">

                            <option selected disabled>== Pilih Halte Akhir ==</option>

                            @foreach ($busKoridor as $buskor => $busstops)



                            <optgroup label="Koridor {{ $buskor }}">

                                @foreach($busstops as $busstop)

                                <option value="{{ $busstop->id }}" {{ ($activity->halte_akhir_id === $busstop->id ? "selected":"") }}>{{ $busstop->nama_halte }}</option>

                                @endforeach

                            </optgroup>



                            @endforeach

                        </select>

                        @error('halte_akhir_id')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label>Problem</label>

                        <textarea name="problem" class="form-control @error('problem') is-invalid @enderror" rows="3" placeholder="Detail Problem/ Kerusakan">{{ $activity->problem }}</textarea>

                        @error('problem')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                    <div class="form-group">

                        <label>Help Topik</label>

                        <select name="helptopic_id" class="form-control select2bs4 @error('helptopic_id') is-invalid @enderror" style="width: 100%;">

                            <option selected disabled>== Pilih Help Topic ==</option>

                            @foreach($helptopics as $helptopic)

                            <option value="{{ $helptopic->id }}" {{ ($activity->helptopic_id === $helptopic->id ? "selected":"") }}>{{ $helptopic->topic_name }}</option>

                            @endforeach

                        </select>

                        @error('helptopic_id')

                        <div class=" invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>





                    <div class="mb-3">

                        <label>Action</label>

                        <textarea name="action" class="form-control @error('action') is-invalid @enderror" rows="3" placeholder="Detail Action/ Penanganan">{{ $activity->action }}</textarea>

                        @error('action')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label>Root Cause</label>

                        <textarea name="root_cause" class="form-control @error('root_cause') is-invalid @enderror" rows="3">{{ $activity->root_cause }}</textarea>

                        @error('root_cause')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                    <p class="text-sm mb-0"></p>

                    <div class="col-sm-6">

                        <label>Status</label>

                        <div class="form-group">

                            <div class="custom-control custom-radio">

                                <input class="custom-control-input" type="radio" id="customRadio1" value="Close" name="status" {{ ($activity->status == "Close") ? "checked" : "" }}>

                                <label for="customRadio1" class="custom-control-label">Close</label>

                            </div>

                            <div class="custom-control custom-radio">

                                <input class="custom-control-input" type="radio" id="customRadio2" value="Open" name="status" {{ ($activity->status == "Open") ? "checked" : "" }}>

                                <label for="customRadio2" class="custom-control-label">Open</label>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Assign to</label>

                        <input type="text" name="assign_to" class="form-control @error('assign_to') is-invalid @enderror" value="{{ $activity->assign_to }}" placeholder="Ditugaskan kepada..">

                        @error('assign_to')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>









                </div>



                <div class="card-footer">

                    <button type="submit" class="btn btn-info">Update</button>



                    <button onclick="window.location.href='{{ url()->previous() }}';" type="button" class="btn btn-default float-right">Back</button>



                </div>

            </form>

        </div>

    </div>

</div>





@push('script-select2')

<script>
    $(function() {

        //Initialize Select2 Elements

        $('.select2').select2()



        //Initialize Select2 Elements

        $('.select2bs4').select2({

            theme: 'bootstrap4'

        })

    });
</script>

@endpush





@push('script-summerNote')

<script src="/assets-template/summernote/summernote-bs4.min.js"></script>

<script>
    $(function() {

        // Summernote

        $('.textarea').summernote({

            height: 100, // set editor height

            minHeight: null, // set minimum height of editor

            maxHeight: null, // set maximum height of editor

            focus: true, // set focus to editable area after initializing summernote

            placeholder: 'Detail Problem/ Kerusakan',

            fontSizes: ['10', '11', '12', '14', '16'],

            focus: false,

            airMode: false,

            fontNames: ['Roboto', 'Calibri', 'Times New Roman', 'Arial'],

            fontNamesIgnoreCheck: ['Roboto', 'Calibri'],

            dialogsInBody: true,

            dialogsFade: true,

            disableDragAndDrop: false,



            toolbar: [

                // [groupName, [list of button]]

                ['para', ['ul', 'ol']],

                ['fontsize', ['fontsize']],

                ['style', ['bold', 'italic', 'underline', 'clear']],

                //['font', ['strikethrough', 'superscript', 'subscript']],

                //['height', ['height']],

                //['table', ['table']],

                ['misc', ['undo', 'redo', 'fullscreen']]

            ],

            popover: {

                air: [

                    ['color', ['color']],

                    ['font', ['bold', 'underline', 'clear']]

                ]

            },

            /* print: {

                'stylesheetUrl': 'url_of_stylesheet_for_printing'

            } */

        });



        $('.textareaCause').summernote({

            height: 100, // set editor height

            minHeight: null, // set minimum height of editor

            maxHeight: null, // set maximum height of editor

            focus: true, // set focus to editable area after initializing summernote

            placeholder: 'Detail Root Cause/ Akar dari masalah',

            fontSizes: ['10', '11', '12', '14', '16'],

            focus: false,

            airMode: false,

            fontNames: ['Roboto', 'Calibri', 'Times New Roman', 'Arial'],

            fontNamesIgnoreCheck: ['Roboto', 'Calibri'],

            dialogsInBody: true,

            dialogsFade: true,

            disableDragAndDrop: false,



            toolbar: [

                // [groupName, [list of button]]

                ['para', ['ul', 'ol']],

                ['fontsize', ['fontsize']],

                ['style', ['bold', 'italic', 'underline', 'clear']],

                //['font', ['strikethrough', 'superscript', 'subscript']],

                //['height', ['height']],

                //['table', ['table']],

                ['misc', ['undo', 'redo', 'fullscreen']]

            ],

            popover: {

                air: [

                    ['color', ['color']],

                    ['font', ['bold', 'underline', 'clear']]

                ]

            },

            /* print: {

                'stylesheetUrl': 'url_of_stylesheet_for_printing'

            } */

        });

    })
</script>

@endpush



@endsection
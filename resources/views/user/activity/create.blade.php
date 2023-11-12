@extends('desk-layout.main')
@section('title', 'Create Daily Activity')
@section('subtitle', 'Create Daily Activity')

@section('content')
@push('css-filepond')
<link href="/assets-template/filepond/filepond.css" rel="stylesheet" />
<!-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" /> -->
<!-- <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"> -->
@endpush

@push('script-summer-note')
<link rel="stylesheet" href="/assets-template/summernote/summernote-bs4.css">
@endpush

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Daily Report West</h3>
            </div>
            <form role="form" method="POST" action="{{ route('createActivity') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="customFile">Upload Photo Problem </label>
                        <input type="file" name="fileImage" class="filepond @error('fileImage') is-invalid @enderror" name="fileImage" id="fileImage" data-max-file-size="1MB" data-max-files="1">
                        @error('fileImage')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nomor Tiket</label>
                        <input type="text" name="nomor_tiket" class="form-control @error('nomor_tiket') is-invalid @enderror" id="" oninput="this.value=this.value.replace(/[^0-9]/g,'');" min="10" maxlength="10" value="{{ old('nomor_tiket') }}" placeholder="Masukkan Nomor Tiket">
                        @error('nomor_tiket')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- <div class="form-group">
                        <label>Lokasi Awal</label>
                        <select name="halte_awal_id" class="form-control select2bs4 @error('halte_awal_id') is-invalid @enderror" style="width: 100%;">
                            <option selected disabled>== Pilih Halte Awal ==</option>
                            @foreach ($busKoridor as $buskor => $busstops)

                            <optgroup label="Koridor {{ $buskor }}">
                                @foreach($busstops as $busstop)
                                <option value="{{ $busstop->id }}" {{ (old("halte_awal_id") == $busstop->id ? "selected":"") }}>{{ $busstop->nama_halte }}</option>
                                @endforeach
                            </optgroup>

                            @endforeach
                        </select>
                        @error('halte_awal_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> -->

                    <div class="form-group">
                        <label>Lokasi Tujuan</label>
                        <select name="halte_akhir_id" class="form-control select2bs4 @error('halte_akhir_id') is-invalid @enderror" style="width: 100%;">
                            <option selected disabled>== Pilih Halte Akhir ==</option>
                            @foreach ($busKoridor as $buskor => $busstops)

                            <optgroup label="Koridor {{ $buskor }}">
                                @foreach($busstops as $busstop)
                                <option value="{{ $busstop->id }}" {{ (old("halte_akhir_id") == $busstop->id ? "selected":"") }}>{{ $busstop->nama_halte }}</option>
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
                        <textarea name="problem" class="form-control @error('problem') is-invalid @enderror" rows="3" placeholder="Detail Problem/ Kerusakan">{{ old('problem') }}</textarea>
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
                            <option value="{{ $helptopic->id }}" {{ (old("helptopic_id") == $helptopic->id ? "selected":"") }}>{{ $helptopic->topic_name }}</option>
                            @endforeach

                        </select>
                        @error('helptopic_id')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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

@push('script-filepond')
<!-- <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> -->
<script src="{{ url('assets-template/filepond/filepond.js') }}"></script>
<script src="{{ url('assets-template/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ url('assets-template/filepond/filepond-plugin-file-validate-size.min.js') }}"></script>
<!-- <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
 -->
<script>
    // Register the plugin (max size yg diijinkan)
    FilePond.registerPlugin(FilePondPluginFileValidateSize);

    // validate type file
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="fileImage"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        allowFileSizeValidation: true,
        maxFileSize: "1MB",
        acceptedFileTypes: [
            'image/jpeg',
            'image/png',
        ],

        server: {
            /*url: '/upload',*/
            process: {
                url: `{{ route('upload') }}`,
            },
            /* process: '/process', */
            revert: {
                url: `{{ route('filepond.delete') }}`,
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',

            }

        }

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
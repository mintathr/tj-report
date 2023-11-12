@extends('desk-layout.main')
@section('title', 'Update Daily Activity')
@section('subtitle', 'Update Daily Activity')

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
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Daily Report West</h3>
            </div>
            <form role="form" method="POST" action="{{ route('updateActivity', $activity->nomor_tiket) }}">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nomor Tiket</label>
                        <input type="text" name="" class="form-control" value="{{ $activity->nomor_tiket }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="customFile">Upload Photo Perbaikan </label>
                        <input type="file" name="fileImage" class="filepond @error('fileImage') is-invalid @enderror" name="fileImage" id="fileImage" data-max-file-size="1MB" data-max-files="1">
                        @error('fileImage')
                        <div class="invalid-feedback">
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
                        <textarea name="root_cause" class="form-control @error('root_cause') is-invalid @enderror" rows="3" placeholder="Detail Root Cause/ Akar dari masalah">{{ $activity->root_cause }}</textarea>
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
                                <input class="custom-control-input" type="radio" id="customRadio1" value="Close" name="status">
                                <label for="customRadio1" class="custom-control-label">Close</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" value="Open" checked name="status">
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
                url: `{{ route('upload.perbaikan') }}`,
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
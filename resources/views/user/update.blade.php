@extends('desk-layout.main')
@section('title', 'Update Ticketing')
@section('subtitle', 'Update Ticketing')

@section('content')
@push('css-filepond')
<link href="/assets-template/filepond/filepond.css" rel="stylesheet" />
@endpush
@push('script-summer-note')
<link rel="stylesheet" href="/assets-template/summernote/summernote-bs4.css">
@endpush

<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Update Daily Report West</h3>
            </div>
            <form role="form">
                <div class="card-body pad">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor Tiket</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" value="1336011648" readonly>
                    </div>

                    <div class="form-group">
                        <label for="customFile">Upload Foto Perbaikan
                            <!-- <br><small>Max 2 file</small> -->
                        </label>
                        <input type="file" class="filepond @error('description') is-invalid @enderror" name="fileExcel" id="fileExcel" accept="image/png, image/jpeg, image/gif" multiple data-max-file-size="3MB" data-max-files="1">
                        <!-- @error('fileExcel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror -->
                    </div>

                    <div class="mb-3">
                        <label>Action</label>
                        <textarea class="textarea @error('description') is-invalid @enderror" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 38px; border: 1px solid #dddddd; padding: 50px;" value="{{ old('description') }}"></textarea>
                        @error('description')
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
                                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                <label for="customRadio1" class="custom-control-label">Close</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                <label for="customRadio2" class="custom-control-label">Open</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Assign to</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ditugaskan kepada..">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script-filepond')
<!-- <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> -->
<script src="/assets-template/filepond/filepond.js"></script>
<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="fileExcel"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        server: {
            url: '/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
            placeholder: 'Detail Action/ Penanganan',
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
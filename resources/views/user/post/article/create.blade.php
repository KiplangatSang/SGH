@extends('layouts.app')

@section('content')
<div class="row m-1">
    <div class="col col-md-4">
        <div class="tile">
            <div class="tile-title">Articles</div>
            <div class="tile-body">
                <h3 class="display-5 text-success"><small>{{ auth()->user()->name }}</small></h3>
                <h6><small>{{ auth()->user()->email }}</small> </h6>
                <hr>
                <div class="col">
                    <div class="tile">
                        <div class="tile-body">
                            <h3>Title images</h3>
                            @if (session('image_title'))
                            {{-- {{ dd(session('images'))}} --}}
                            @foreach (session('image_title') as $key => $image)
                            <div class="row m-1">
                                <div class="col-md-2 icon m-1">
                                    <img src="{{ $image }}" alt="title image" width="35" height="35">
                                </div>
                                <input type="text" value="{{ $image }} " id="imageUrlInput{{ $key }}" class="disabled">

                                <button class="btn btn-secondary ml-2" onclick="copyImageUrl('imageUrlInput'+@json($key),'imageUrlBtn'+@json($key))" id="imageUrlBtn{{ $key }}">Copy</button>
                            </div>
                            @endforeach
                            @endif

                            <hr>

                            <div class="form-group p-2">
                                <h3>Category of your article</h3>
                                <h4 class="">Category: {{ $postdata['post']->post_category_name }}
                                </h4>
                                <br>
                                <hr>
                            </div>
                            <div class="form-group">
                                <h4 class="">Title: {{ $postdata['post']->post_title }}
                                </h4>

                                <br>
                                <hr>


                            </div>
                            <div class="form-group">
                                <h4 class="">Subtitle: {{ $postdata['post']->post_subtitle }}
                                </h4>
                                <br>
                                <hr>
                            </div>

                            <h3>Post Body Images</h3>

                            @if (count($postdata['images']) > 0)
                            @foreach ($postdata['images'] as $key => $image)
                            <div class="row m-1">
                                <div class="col-md-2 icon m-1">
                                    <img src="{{ $image }}" alt="article image" width="35" height="35">
                                </div>
                                <input type="text" value="{{ $image }} " id="imageUrlInput{{ $key }}" class="disabled">

                                <button class="btn btn-secondary ml-2" onclick="copyImageUrl('imageUrlInput'+@json($key),'imageUrlBtn'+@json($key))" id="imageUrlBtn{{ $key }}">Copy</button>
                            </div>
                            @endforeach
                            @endif

                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
    <div class=" col-md-8 col-xl-8">


        <form method="POST" action="/user/post/update/{{ $postdata['post']->id }}" enctype="multipart/form-data" id="postForm">
            @csrf
            <div class="form-group" id="trackingDiv"></div>
            <div class="form-group">
                <label class="text-light" for="exampleFormControlTextarea1">Create Your Article</label>

                <textarea name="post_body" class="textarea form-control @error('post_body') is-invalid @enderror ckeditor" rows="26">{{ $postdata['post']->post_body }}</textarea>
                @error('post_body')
                <span class="invalid-feedback bg-white p-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row">

                <button type="submit" class="btn btn-success m-2">Update Article</button>
                <a onclick="submitForm(@json($postdata['post']->id))" class="btn btn-success m-2">Preview
                    Article</a>
            </div>

    </div>





    </form>

</div>
</div>

</div>
<!-- CkEditor -->
{{-- CK-Editor --}}
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>

<script>
    let myEditor;
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log('Editor was initialized', editor);
            myEditor = editor;
        })
        .catch(err => {
            console.log(err.stack);
        });

</script>

{{-- javascripts --}}
<!-- Essential javascripts for application to work-->
<script src="{{ asset('assets2/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets2/js/popper.min.js') }}"></script>
<script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets2/js/main.js') }}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{ asset('assets2/js/plugins/pace.min.js') }}"></script>

<!-- Page specific javascripts-->

<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets2/js/plugins/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>
<script type="text/javascript">
    function copyImageUrl(inputId, button_id) {
        /* Get the text field */
        var copyText = document.getElementById(inputId);
        var copyButton = document.getElementById(button_id);

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        copyButton.innerHTML = "Copied";
        copyButton.style.backgroundColor = 'white';
        copyButton.style.color = 'green';

        /* Alert the copied text */
        //alert("Copied the text: " + copyText.value);
    }

    function submitForm($id) {
        var form_route = $id
        var form_action = "/user/post/preview/";
        document.getElementById("postForm").action = form_action + form_route;
        document.getElementById("postForm").submit();
    }

    $('#el').on('click', function() {
        $('#tl').loadingBtnComplete();
        $('#tb').loadingBtnComplete({
            html: "Sign In"
        });
    });

    $('#demoDate').datepicker({
        format: "dd/mm/yyyy"
        , autoclose: true
        , todayHighlight: true
    });

    $('#demoSelect').select2();

</script>

<script>
    $(document).ready(function() {

        Dropzone.options.dropzoneFrom = {
            autoProcessQueue: false
            , acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg"
            , init: function() {
                var submitButton = document.querySelector('submit-all');
                myDropzone = this;
                submitButton.addEventListener("click", function() {
                    myDropzone.autoProcessQueue();
                });

                this.on("complete", function() {

                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles.length ==
                        0) {
                        var _this = this
                        _this.removeAllFiles
                    }

                });
            }
        , };
    });

</script>
@endsection

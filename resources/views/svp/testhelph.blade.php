@extends('layouts.svp')

@section('content')
    <textarea ></textarea>
    <button id='x'>click me</button>
@endsection


@push('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.pkgd.min.js"></script>
<script>
$('textarea').froalaEditor({
        // Set the image upload parameter.
        imageUploadParam: 'image_param',
 
        // Set the image upload URL.
        imageUploadURL: '/upload_image',
 
        // Additional upload params.
        imageUploadParams: {id: 'my_editor'},
 
        // Set request type.
        imageUploadMethod: 'POST',
 
        // Set max image size to 5MB.
        imageMaxSize: 5 * 1024 * 1024,
 
        // Allow to upload PNG and JPG.
        imageAllowedTypes: ['jpeg', 'jpg', 'png']
      })

$('#x').click(function(){
    let text = $('textarea').froalaEditor('html.get');
    let token = document.head.querySelector('meta[name="csrf-token"]');

    $.ajax({
        type: "POST",
        url:"/svp/sendhelp",
        data: {data:text, _token:token.content},
        success: function(a){
            alert(a);
        },
    });
});
 </script>

@endpush

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

<!-- Include Editor style. -->
<link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

@endpush
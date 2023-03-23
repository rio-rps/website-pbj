@extends('private.layout.main')
@section('isi')
<!-- BEGIN: Vendor CSS EDITOR-->
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/vendors/css/forms/quill/katex.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/vendors/css/forms/quill/monokai-sublime.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/vendors/css/forms/quill/quill.snow.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/vendors/css/forms/quill/quill.bubble.css">
<!-- END: Vendor CSS-->

<body>
    <form action="{{route('lamandetail.update',$id)}}" method="POST">
        <input type="hidden" name="slug" value="{{$row->slug_laman}}">
        @csrf
        @method('PUT')
        <div id="editor">{!! $row->isi_laman !!}</div>
        <input type="text" name="content" id="content" value="{{$row->isi_laman}}">
        <button type="submit">Update</button>
    </form>

    <script src="{{ asset('/') }}private/vendors/js/forms/quill/highlight.min.js"></script>
    <script src="{{ asset('/') }}private/vendors/js/forms/quill/quill.js"></script>
    <script src="{{ asset('/') }}private/vendors/js/forms/quill/katex.min.js"></script>
    <script src="{{ asset('/') }}private/js/scripts/forms/quill/form-text-editor.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'link'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'align': []
                    }],
                    ['clean']
                ]
            },

        });

        var contentInput = document.querySelector('#content');
        quill.on('text-change', function(delta, oldDelta, source) {
            contentInput.value = quill.root.innerHTML;
        });
    </script>
</body>
@endsection
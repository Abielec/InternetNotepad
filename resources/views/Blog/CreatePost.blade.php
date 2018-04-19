@extends('layouts.PLayout')

@push('styles')
<script src="{{asset('/src/js\vendor/js/tinymce/js/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{asset('/src/js\vendor/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern codesample",
      "fullpage toc imagetools help"
    ],
    formats:[
     {block: 'p',classes: 'lead'},
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
    });
</script>
@endpush


@section('content')
<div class="container" style="text-align:center;margin-top:3rem;align-items:center;justify-content:center;height:100vh;overflow:hidden;">
        <form method="POST" action="{{ route('AddPost')}}" enctype="multipart/form-data" class="form">
            <h1>Tworzenie postu</h1>
            @if($errors->any())
                    <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                            @endforeach
                    </ul>
            @endif
            @csrf
        <fieldset>
            <div class="form-row">
                <input type="hidden" value="{{Auth::user()->id}}" name="WritedBy" id="WritedBy"/>
                    <div class="form-group col-md-12">
                            <label for="Title">Tytuł</label>
                            <input type="text" required class="form-control" id="Title" name="Title" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                            <label for="content">Treść</label>
                            <textarea class="form-control" id="content" name="content" rows="15" value="{{ old('content') }}"></textarea>
                    </div>
                </div>
            <div class="form-row">
                <label class="custom-file">
                    <input type="file" id="img" name="img" class="custom-file-input">
                    <span class="custom-file-control"></span>
                </label>
            </div>
            <input type="submit" value="Wyślij" class="btn btn-primary" />
        </fieldset>
        </form>
</div>
@endsection
@section('scripts')

@endsection
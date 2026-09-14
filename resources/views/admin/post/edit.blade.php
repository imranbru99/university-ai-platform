@extends('admin.layouts.app')

@section('panel')
    <div class="container">
        <div class="align-item-senter justify-content-between">
            <form action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="">Post Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <input type="file" name="image" class="file">
                    </div>
                    <div class="">
                        <img src="{{ asset($post->path . '/' . $post->image) }}" alt="profile-image" height="300"
                            width="300" class="b-radius--10 w-10">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-5">
                        <label for="" class="">Post Description</label>
                        <textarea id="summernote" name="description">{{ $post->description }}</textarea>
                    </div>
                </div>

                <textarea name="content" id="editor"></textarea>



                <div class="form-group">
                    <button class="btn btn-primary btn-block btn-lg">Edit a this Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('style')
    h2 {
    background-color: yellow;
    }
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello Bootstrap 4',
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

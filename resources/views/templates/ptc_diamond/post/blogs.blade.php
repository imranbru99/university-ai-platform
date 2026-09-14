@extends($activeTemplate . 'layouts.home')
@section('content')
    @php
        $blogCaption = getContent('blog.content', true);
    @endphp
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-6">
                    <div class="blog_img"><img
                            src="{{ getImage('assets/images/frontend/blog/thumb_' . $blog->data_values->image, '415x250') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="blog_taital"> {{ __($blog->data_values->title) }}</h1>
                    <p class="blog_text"> {{ strLimit(strip_tags($blog->data_values->description), 200) }}</p>
                    <div class="read_bt"><a href="{{ route('blogDetail', $blog->id) }}">Read More</a></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

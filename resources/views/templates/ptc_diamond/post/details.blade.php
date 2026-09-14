@extends($activeTemplate . 'layouts.mariam')
@section('content')
    <section class="single-block-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-post">
                        <div class="post-header mb-5 text-center">
                            <h2 class="post-title mt-2">
                                {{ __($post->title) }}
                            </h2>
                            <div class="post-meta">
                                <span class="text-uppercase font-sm letter-spacing-1 mr-3">
                                    {{ $post->user->fullname }}</span>
                                <span class="text-uppercase font-sm letter-spacing-1">
                                    {{ showDateTime($post->created_at, 'F j Y') }}</span>
                            </div>
                            <div class="post-featured-image mt-5">
                                <img src="{{ asset($post->image) }}" class="img-fluid w-100" alt="featured-image">
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="entry-content">
                                @php echo $post->description @endphp
                            </div>
                        </div>
                    </div>

                    <div class="related-posts-block mt-5">
                        <h3 class="news-title mb-4 text-center">
                            You May Also Like
                        </h3>
                        <div class="row">
                            @foreach ($latests as $recent)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="post-block-wrapper mb-4 mb-lg-0">
                                        <a href="{{ route('postDetails', $recent->slug) }}">
                                            <img class="img-fluid" src="{{ asset($recent->image) }}" alt="post-thumbnail" />
                                        </a>
                                        <div class="post-content mt-3">
                                            <h5>
                                                <a href="{{ route('postDetails', $recent->slug) }}">
                                                    {{ __($recent->title) }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

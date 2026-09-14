@extends($activeTemplate . 'layouts.mariam')
@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        @forelse ($posts as $post)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <article class="post-grid mb-5 ">
                                    <a class="post-thumb mb-4 d-block" href="{{ route('postDetails', $post->slug) }}">
                                        <img src="{{ asset($post->image) }}" alt="" class="img-fluid w-100">
                                    </a>

                                    <div class="post-content-grid">
                                        <div class="label-date">
                                            <span class="day">{{ $post->created_at->format('d') }}</span>
                                            <span class="month text-uppercase">{{ $post->created_at->format('M') }}</span>
                                        </div>
                                        <span class="cat-name text-color font-extra font-sm text-uppercase letter-spacing">
                                            {{ $post->user->fullname }}</span>
                                        <h3 class="post-title mt-1"><a href="{{ route('postDetails', $post->slug) }}">
                                                {{ $post->title }}</a></h3>
                                        <p></p>
                                    </div>
                                </article>
                            </div>
                        @empty
                            <p class="text-center">No Post Exist</p>
                        @endforelse
                    </div>
                </div>


                @if ($posts->hasPages())
                    <div class="m-auto">
                        <div class="pagination mt-5 pt-4">
                            {{ $posts->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

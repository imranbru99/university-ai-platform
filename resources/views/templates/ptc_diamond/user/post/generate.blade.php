@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="cmn-section">
        <div class="container">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <form method="POST" action="{{ route('user.generate') }}">
                        @csrf
                        <div class="row">
                            <label for="keyword">Keyword:</label>
                            <input type="text" name="keyword" placeholder="Type a University name">
                        </div>

                        <div class="row">
                            <label for="skill" class="form-label">@lang('Tags')</label>
                            <div class="skill-body">
                                <select class="select2-auto-tokenize form-control form--control" multiple="multiple"
                                    name="tags[]" required>
                                    @if (@$tags)
                                        @foreach (@$tags as $tag)
                                            <option value="{{ @$tag->name }}" selected>{{ __(@$tag->name) }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success mx-auto">
                            <span>Create a New Post</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/global/css/select2.min.css') }}">
    <style>
        .select2-search__field {
            width: 24.75em !important;
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('assets/global/js/select2.min.js') }}"></script>
    <script>
        $(".select2-auto-tokenize").select2({
            tags: true,
            tokenSeparators: [","],
            dropdownParent: $(".skill-body"),
        });
    </script>
@endpush

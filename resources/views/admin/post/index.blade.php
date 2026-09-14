@extends('admin.layouts.app')
@section('panel')
    <div class="custom--table-container table-responsive--md">
        <table class="table table custom--table">
            <thead class="thead-dark">
                <tr>
                    <th>@lang('Sr.')</th>
                    <th class="text-center">@lang('Title')</th>
                    <th class="text-center">@lang('Create At')</th>
                    <th class="text-center">@lang('Post Link')</th>
                    <th class="text-center">@lang('Edit')</th>
                </tr>
            </thead>
            <tbody>

                @forelse($posts as $post)
                    <tr>
                        <td data-label="@lang('Sr')">
                            <span class="fw-bold"><span class="text-primary"> {{ $loop->iteration }}</span></span>
                        </td>
                        <td data-label="@lang('Title')">
                            <span class="fw-bold"><span class="text-primary"> {{ __(@$post->title) }}</span></span>
                        </td>
                        <td data-label="@lang('Create At')" class="text-center">
                            {{ showDateTime($post->created_at) }} <br> {{ diffForHumans($post->created_at) }}
                        </td>
                        <td data-label="@lang('Link')">
                            <a href="{{ route('postDetails', $post->slug) }}" target="_blank">Link</a>
                        </td>
                        <td data-label="@lang('Edit')">
                            <a href="{{ route('admin.post.edit', $post->id) }}" target="_blank">Edit</a>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($posts->hasPages())
        <div class="d-flex justify-content-end mt-4">
            {{ $posts->links() }}
        </div>
    @endif
@endsection

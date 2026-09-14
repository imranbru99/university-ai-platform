@extends($activeTemplate . 'layouts.app')
@section('panel')
    @if (!request()->routeIs('home') && !request()->routeIs('user.login') && !request()->routeIs('user.register'))
    @endif
    @yield('content')
@endsection

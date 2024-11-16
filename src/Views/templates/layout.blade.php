@extends('master')
@section('contentmaster')
    @include('layout.header')
    @includeWhen(!empty($slider), 'layout.slider')
    @includeWhen(\NINA\Core\Support\Str::isNotEmpty(BreadCrumbs::get()),'layout.breadcrumbs')
    @yield('content')
    @include('layout.footer')
    @include('layout.extensions')
    @include('layout.phone')
@endsection
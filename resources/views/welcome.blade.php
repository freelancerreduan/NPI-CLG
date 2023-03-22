@extends('layouts.app')
@section('content')
    @include('partials.navbar')
    @include('partials.banner')

    @if (count($counters) > 0)
        @include('partials.counter')
    @endif

    @include('partials.subjects')
    @include('partials.apply-now')
    @include('partials.teachers')
    @include('partials.blog')
    @include('partials.presentation')
@endsection

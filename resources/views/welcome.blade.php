@extends('layouts.app')
@section('content')
    @include('partials.navbar')
    @include('partials.banner')

    @if (count($counters) > 0)
        @include('partials.counter')
    @endif
    @if (count(categories('top', 3)) > 0)
        @include('partials.subjects')
    @endif
    @include('partials.apply-now')
    @include('partials.teachers')
    @include('partials.blog')
    @include('partials.presentation')
@endsection

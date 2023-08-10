@extends('layouts.app')
@section('content')
@include('partials.navbar')
<br>
<div class="container-fluid my-3">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-3">
                    {{-- <a href="" class="card-blog w-100">
                        <img src="" alt="" class="img-fluid">
                        <div class="px-2 py-1 shadow p-3 mb-5 bg-body rounded">
                            <span class="text-muted">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M y') }} </span>
                            <a href="#" class="h5 text-dark d-block"></a>
                            <p class=" my-0">{!! substr($blog->description, 0, 50) !!}</p>
                        </div>
                    </a> --}}

                        <div class="card shadow-sm rounded">
                            <a href="{{ route('frontend.blog.details', $blog->slug) }}"><img class="card-img-top" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"></a>
                            <div class="card-body">
                                <a href="{{ route('frontend.blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                <span class="text-muted d-block">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M y') }} </span>
                            </div>
                        </div>

                </div>
            @endforeach
            {{ $blogs->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection

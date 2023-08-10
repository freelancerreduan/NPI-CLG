@extends('layouts.app')
@section('content')
@include('partials.navbar')
<br>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="p-2 shadow-sm rounded">
                        <img src="{{ asset($blog->image) }}" class="img-fluid w-100 mb-3" alt="{{ $blog->title }}">
                        <h2>{{ $blog->title }}</h2>
                        <div class="d-flex justify-content-start align-items-center">
                            <span class="me-2">Posted By: <b>{{ $blog->blogWithUserRelation->name }}</b></span>
                            <span class="text-danger">&#8226;</span>
                            <span class="mx-2">Posted In: <b>{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                            </b></span>
                        </div>
                        <div class="my-3">
                            {!! $blog->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-2 shadow-sm rounded">
                        <h4>Resent Post</h4>
                        @foreach ($resentPosts as $post)
                            <a href="{{ route('frontend.blog.details', $post->slug) }}" class="text-dark mb-2 border-bottom">
                                <div class="d-flex justify-content-start align-items-center text-decoration-none">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded" width="100">
                                    <div class="ms-2">
                                        <h6 class="">{{ strlen($post->title) > 45 ? substr($post->title, 0, 45).'...' : $post->title }}</h6>
                                        <span class="d-block">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

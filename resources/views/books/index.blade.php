@extends('layouts.app')
@section('styles')
    <style>
        .home-view-design {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
@endsection
@section('content')
@include('partials.navbar')
<!-- Book List -->
<section class="home-view-design text-white" style="background: linear-gradient(rgb(0,0,0,0.5),rgb(0,0,0,0.5)),url({{ asset('frontend/assets/img/bg-book.jpg') }});">
    <div class="container-fluid">
        <div class="container">
            <div class="row ">
              <div class="col-md-4">
                <div class="view-screen-design-right">
                  <img src="{{ asset('frontend/assets/img/book.png') }}" alt="" class="img-fluid view-screen-img">
                </div>
              </div>
              <div class="col-md-8">
                  <div class="view-screen-design py-5">
                    <h2 class="" style="line-height: 40px;  font-style: oblique; font-family: cursive;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, velit.</h2>

                    <p class="py-3" style="    font-family: cursive;"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas adipisci corrupti laborum cumque maxime! Quos commodi enim provident numquam neque ab ducimus eaque obcaecati, exercitationem doloribus fuga, saepe ad tempore.</p>
                    <h3 class="" style="font-family:monospace ;">Subscribe Now</h3>
                    <div class="d-flex justify-content-center sub-input">
                      <input type="text" class="form-control text-white" placeholder="Email">
                      <button class="btn btn-primary sub-btn">Subscribe</button>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
  </section>



  <!-- Book list -->
  <section class="book-item-section py-5">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <h2 class=" text-danger text-center py-3" style="font-family:cursive">All Book Hear</h2>
          @foreach ($books as $book)
            <div class="col-6 col-md-3">
                <div class=" shadow mb-5 bg-white rounded ">
                <div class="card-img" onclick="return window.location.href='{{ route('frontend.book.details', $book->slug) }}';">
                    <img src="{{ asset($book->thumbnail) }}" alt="book " class="img-fluid rounded">
                </div>

                <div class="card-title px-2 pt-3">
                    <span class="text-danger">Name: </span>
                    <h2 class="h6 text-danger d-inline">{{ $book->name }}</h2>
                </div>

                <div class="text-area px-2 pb-3 pt-0">
                    <span class="text-danger pb-5">Technology: </span>
                    <a href="#" class="related-item-header pb-"> {{ $book->technology }}</a>
                    <br>
                    <span class="text-danger">Samister: </span>
                    <a href="#" class="related-item-header">{{ $book->simister }}</a>
                </div>

                <div class="btn-area pb-3 ps-md-2">
                    <button onclick="return window.location.href='{{ route('frontend.book.details', $book->slug) }}';" class="btn btn-outline-primary me-md-2 ms-1  py-1"  data-bs-toggle="modal" data-bs-target="#scrollingModal">Read this book </button>

                    @auth
                        @php
                            $like = DB::table('likes')->where([['user_id', auth()->user()->id], ['book_id', $book->id]])->exists();
                        @endphp
                        @if ($like)
                            <i onclick="like({{ $book->id }}, 1);" class="fas fa-heart text-danger text-center py-2 rounded love-icon ms-1"></i>
                        @else
                            <i onclick="like({{ $book->id }}, 0);" class="far fa-heart text-white text-center py-2 rounded love-icon ms-1"></i>
                        @endif
                    @else
                        <i onclick="window.location.href='{{ route('login') }}'" class="far fa-heart text-white text-center py-2 rounded love-icon ms-1"></i>
                    @endauth
                </div>
                </div>
            </div>
          @endforeach
        </div>
        {{ $books->withQueryString()->links() }}
      </div>
    </div>
  </section>
@endsection
@section('scripts')
  <script>
    function like(book_id, like){
        var bookId = book_id;
        var like = like;
        $.ajax({
                type: 'POST',
                data: {bookId:bookId},
                url:'{{ route('frontend.book.favorite') }}',
                success: function (data){
                    if (data == 'likeDone') {
                        if (like == 1) {

                        }
                    }

                }
            });
    }
  </script>
@endsection

@extends('layouts.app')
@section('styles')
    <style>

    </style>
@endsection
@section('content')
@include('partials.navbar')


<!-- Book Page Start -->
<section class="book-section">
    <div class="container-fluid card-sention pt-5 pb-1  ">
        <div class="container">
            <div class=" shadow p-3 mb-5 bg-body rounded py-3">
                <div class="row">
                    <div class="col-md-3">
                       <a href="#">
                            <img src="{{ asset($book->thumbnail) }}" alt="{{ $book->title }}" class="img-fluid book-img" data-bs-toggle="modal" data-bs-target="#scrollingModal">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="py-3">
                            <h5 class="book-heading">{{ $book->title }}</h5>
                            <p class="my-0">[{{ $book->regulations }}]</p>

                            <spna class="text-danger by-text">by</spna>

                            <a href="#" class="#">{{ $book->published_by }}</a>
                            <br>
                            <p class="d-inline my-5">Category: </p>

                            <span class="bg-danger py-1 px-2  text-white rounded">#2 Best Seller</span>

                            <a href="#" class="" style="line-height: 2;     font-family: system-ui;
                            font-style: italic;">  in কম্পিউটার টেকনোলজি: ২য় সেমিস্টার</a>

                            <div class=" my-2 container d-flex justify-content-center align-items-center ps-0">
                                <div class="me-auto ms-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="ratings">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="review-count">4.5 | 12 Reviews</p>
                                    </div>
                                </div>
                            </div>
                            <h4>TK: {{ $book->price }}</h4>
                            <a href="#" class="text-danger py-2">নগদ পেমেন্টে ২১% ইন্সট্যান্ট ক্যাশব্যাক (সর্বোচ্চ ১২৫৳)</a>
                            <div class="btn-area py-4">
                                <button class="btn btn-outline-primary py-2 me-3"  data-bs-toggle="modal" data-bs-target="#scrollingModal">একটু পড়ে দেখুন </button>
                                <button class="btn  px-4 text-white" style="background-color:#FFAD32; font-size: 20px; ">
                                    <i class="far fa-heart"></i>
                                    Favorit
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5 class="text-danger" style="font-family: 'Courier New', Courier, monospace;">Related Book</h5>
                        @foreach ($relatedBooks as $book)
                            <div class="d-flex justify-content-center align-item-center" onclick="window.location.href='{{ route('frontend.book.details', $book->slug) }}'">
                                <div class="img-area col">
                                    <img src="{{ asset($book->thumbnail) }}" alt="{{ $book->title }}" class="img-fluid related-img">
                                </div>
                                <div class="text-area col py-2 ps-2">
                                    <a href="#" class="related-item-header">{{ $book->title }}- {{ $book->simister }}</a>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="d-flex justify-content-center align-item-center pt-2">
                            <div class="img-area col">
                                <img src="assets/img/book-2.png" alt="" class="img-fluid related-img">
                            </div>
                            <div class="text-area col py-2 ps-2">
                                <a href="#" class="related-item-header">অ্যাডভান্সড সার্টিফিকেট ইন কম্পিউটার টেকনোলজি - ২য় সেমিস্টার</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Book page End -->




<!-- Modal -->
<div class="modal  fade " id="scrollingModal" tabindex="-1" aria-labelledby="scrollingModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable modal-sm modal-lg modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scrollingModalLabel"> বইটি পড়ুন </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add your content here -->

        @foreach (pages($book->id) as $page)
            <img src="{{ asset($page->pages) }}" alt="" class="img-fluid book-img mt-1">
        @endforeach




        {{-- <img src="assets/img/book-pag-2.jpg" alt="" class="img-fluid book-img mt-1">
        <img src="assets/img/book-pag.png" alt="" class="img-fluid book-img mt-1">
        <img src="assets/img/book-pag-2.jpg" alt="" class="img-fluid book-img mt-1">
        <img src="assets/img/book-pag.png" alt="" class="img-fluid book-img mt-1">
        <img src="assets/img/book-pag-2.jpg" alt="" class="img-fluid book-img mt-1"> --}}




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Buy Book</button>
      </div>
    </div>
  </div>
</div>







@endsection
@section('scripts')
  <script>
    function like(book_id, el){
        var bookId = book_id;
        $.ajax({
                type: 'POST',
                data: {bookId:bookId},
                url:'{{ route('frontend.book.favorite') }}',
                success: function (data){
                    if (data == 'likeDone') {
                      if ($(el).attr('status') == 'unlike') {
                        $(el).attr('status', 'like');
                        $(el).addClass('fas text-danger');
                        $(el).removeClass('far text-white');
                      } else {
                        $(el).attr('status', 'unlike');
                        $(el).addClass('far text-white');
                        $(el).removeClass('fas text-danger');
                      }
                    }
                }
            });
    }
  </script>
@endsection

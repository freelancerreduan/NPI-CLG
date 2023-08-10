<div data-aos="fade-up"data-aos-duration="1500">
    <div class="container-fluid mx-0 px-0" id="teacher-contact">
        <div class="container p-5">
            <div class="text-item py-4">
              <h5 class="text-primary text-uppercase mb-3 text-center" style="letter-spacing: 5px;">Teachers</h5>
              <h1 class="text-center" style="font-family: cursive ;">Meet Our Teachers</h1>
            </div>
        </div>
        <div class="row  mx-0" style="overflow: hidden;">
          <div class="my-slider mx-0">
            @foreach ($teachers as $teacher)
                <div class="d-inline">
                <div class="col-md-12 col-sm-12 col-xl-12 px-3">
                    <div class="team-item rounded overflow-hidden mb-2 card-css">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="{{ asset($teacher->image) }}" alt="{{ $teacher->name }}">
                        <div class="team-social">


                            @if ($teacher->fb_link)
                                <a class="btn btn-outline-light btn-floating m-1" href="{{ $teacher->fb_link }}" target="_blank"><i class="fab fa-facebook"></i></a>
                            @endif
                            @if ($teacher->ins_link)
                                <a class="btn btn-outline-light btn-floating m-1" href="{{ $teacher->ins_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if ($teacher->tw_link)
                                <a class="btn btn-outline-light btn-floating m-1" href="{{ $teacher->tw_link }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if ($teacher->li_link)
                                <a class="btn btn-outline-light btn-floating m-1" href="{{ $teacher->li_link }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                            @endif



                            {{-- <a class="btn btn-outline-light btn-floating m-1" class="text-white"role="button"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white"role="button"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white"role="button"><i class="fab fa-linkedin-in"></i></a> --}}
                        </div>
                    </div>
                    <div class=" p-3  "style="background-color: #F2F1F8 !important;">
                        <h5 class="card-title text-center" style="font-family: cursive ;">{{ $teacher->name }}</h5>
                        {{-- <p>{{ $teacher->title }}</p> --}}
                        <p class="card-text" style="font-family: cursive ;">{{ $teacher->short_description }}</p>
                        <a href="#button" class="btn btn-primary text-center d-block card-btn" onClick='window.parent.location.href = "tel:{{ $teacher->number }}"'>Call Now</a>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
            <!--1 Card Section Start Hear -->

          </div>
        </div>
    </div>
  </div>

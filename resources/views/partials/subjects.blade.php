<div data-aos="fade-up"data-aos-duration="1500">
    <div class="container-fluid py-0 category-bg">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3 " style="letter-spacing: 5px;">Subjects</h5>
                <h1 style="color:white">Explore Top Depertments</h1>
            </div>
            <div class="row">
                @foreach (categories('top', 3) as $category)
                    <div class="col-md-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2" data-aos="fade-right" data-aos-duration="1500">
                            <img class="img-fluid" src="{{ asset($category->image) }}" alt="">
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">{{ $category->name }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row">
                @foreach (categories('normal', 4) as $category)
                <div class="col-md-3">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2" data-aos="fade-right" data-aos-duration="1500">
                        <img class="img-fluid" src="{{ asset($category->image) }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">{{ $category->name }}</h4>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
  </div>

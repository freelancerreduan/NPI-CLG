<div data-aos="fade-up"data-aos-duration="1500">
    <div class="container-fluid bg-dark text-white" id="notic">
      <div class="container">
        <div class="row">
          <h2 class="text-center my-5" style="font-family: cursive ;">Bangladesh Technology Blogs</h2>
          <!-- Col 1 item hear -->
          @foreach (blogs('top', 1) as $blog)
            <div class="col-sm-12 col-md-4 col-lg-4" data-aos="fade-up"data-aos-duration="1000">
                <h4 class="py-5 " style="font-family: cursive ;"> Top Blog's </h4>
                <div class="img-item-blog">
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="blog-img-item img-fluid">
                </div>
                <div class="text-item-blog">
                <h4 class="">{{ $blog->title }}</h4>
                <p class="">{!! substr($blog->description, 0, 100) !!} </p>
                <div class="">
                    {{ $blog->blogWithUserRelation->name }}

                    <a href="">{{ $blog->blogWithCategoryRelation->name }}</a>
                </div>
                <p class="text-muted">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d') }} • {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</p>
                </div>
            </div>
          @endforeach
          <!-- col 2 item hear -->
          <div class="col-sm-12 col-md-4 col-lg-4" data-aos="fade-up"data-aos-duration="2000">
            <h4 class="py-5 " style="font-family: cursive ;">Trending</h4>
            @foreach (blogs('trending', 4) as $blog)
                <div class="d-flex">
                <div class="flex-shrink-0 mb-3">
                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 150px;">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6>{{ $blog->title }}</h6>
                    <p class="mb-0">{{ $blog->blogWithUserRelation->name }} in <a href="">{{ $blog->blogWithCategoryRelation->name }}</a></p>
                    <p class="text-muted">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d') }} • {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</p>

                </div>
                </div>
            @endforeach
          </div>
          <!-- Col 3 item hear -->
          <div class="col-sm-12 col-md-4 col-lg-4 " data-aos="fade-up"data-aos-duration="3000">
            <h5 class="py-5" style="font-family: cursive ;">Related Blog </h5>

            @foreach (blogs('latest', 4) as $blog)
                <div class="d-flex ">
                <div class="flex-shrink-0">
                    <h4 class="text-muted">0{{ ++$loop->index }}</h4>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="">{{ $blog->title }}</h5>
                    <p class="text-muted mb-0 pb-0">{{ $blog->blogWithUserRelation->name }} in <a href="">{{ $blog->blogWithCategoryRelation->name }}</a></p>
                    <p class="text-muted">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d') }} • {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</p>
                </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

<div data-aos=""data-aos-duration="1500">
	<footer class="footer pt-5">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about" data-aos="fade-right" data-aos-duration="2500">
							<div class="logo">
								<h2 class="text-white " style="text-align: left; font-family: cursive ;">NPI <spna class="text-danger">POLYTECHNIC</spna> </h2>
							</div>
							<p class="text-left" style="text-align: left; padding: 10px 5px;">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
							<p class="call" style="text-align: left; padding: 10px 5px;">Have any questions? Call us 24/7 <span><a href="" style="font-family: cursive ;">+880 1318532992 </a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links text-left px-2" data-aos="fade-right" data-aos-duration="2000">
							<h4 class="text-start" style="font-family: cursive ;">Information</h4>
							<ul  style="padding-left: 0 !important; ">
								<li class="text-start"><a href="#" >About Us</a></li>
								<li class="text-start"><a href="#" >Faq</a></li>
								<li class="text-start"><a href="#" >Terms & Conditions</a></li>
								<li class="text-start"><a href="#" >Contact Us</a></li>
								<li class="text-start"><a href="#" >Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links px-2" data-aos="fade-right" data-aos-duration="1500">
                        <h4 class="text-start" style="font-family: cursive ;">Customer Service</h4>
							<ul style="padding-left: 0 !important; ">
								<li class="text-start"><a href="#">Payment Methods</a></li>
								<li class="text-start"><a href="#">Money-back</a></li>
								<li class="text-start"><a href="#">Returns</a></li>
								<li class="text-start"><a href="#">Shipping</a></li>
								<li class="text-start"><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social" data-aos="fade-right" data-aos-duration="1000">
							<h4 class="text-start" style="font-family: cursive ;">Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul style="padding-left: 0 !important; ">
									<li class="text-start" >NO. 342 - Dhaka.</li>
									<li class="text-start" >012 Dhaka, Bangladesh.</li>
									<li class="text-start" >freelancerreduan.com</li>
									<li class="text-start" >+880 3456 7890</li>
								</ul>
							</div>
							<!-- End Single Widget -->
              <div class=" text-start ps-0 text-md-start ">
                <!-- Facebook -->
                <a
                  class="btn btn-outline-light btn-floating m-1"
                  class="text-white"
                  role="button"
                  ><i class="fab fa-facebook-f"></i
                  ></a>
                <!-- Twitter -->
                <a
                  class="btn btn-outline-light btn-floating m-1"
                  class="text-white"
                  role="button"
                  ><i class="fab fa-twitter"></i
                  ></a>
                <!-- Google -->
                <a
                  class="btn btn-outline-light btn-floating m-1"
                  class="text-white"
                  role="button"
                  ><i class="fab fa-google"></i
                  ></a>
                <!-- Instagram -->
                <a
                  class="btn btn-outline-light btn-floating m-1"
                  class="text-white"
                  role="button"
                  ><i class="fab fa-instagram"></i
                  ></a>
              </div>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p class="text-start">Copyright © 2023 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
              <div class="left">
              </div>
							<div class="right d-flex justify-content-center pt-md-3">
                                @foreach (paymentMethods() as $item)
                                    <a href="{{ route('frontend.pay', Crypt::encrypt($item->id)) }}">
                                        <img src="{{ asset($item->logo) }}" alt="{{ $item->account_name }}" class="mx-3" style="height: 30px; width: ;">
                                    </a>
                                @endforeach
                                {{-- <img src="{{ asset('frontend') }}/assets/img/nagad-logo.png" alt="" class="mx-3" style="height: 30px; width: ;"> --}}
								{{-- <img src="{{ asset('frontend') }}/assets/img/payments.png" alt="#" style="width: 50%;"> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="asset('frontend') }}/assets/js/owl-carousel.js"></script>
<script src="asset('frontend') }}/assets/js/lightbox.js"></script>
<script src="asset('frontend') }}/assets/js/tabs.js"></script>
<script src="asset('frontend') }}/assets/js/video.js"></script>
<script src="asset('frontend') }}/assets/js/slick-slider.js"></script>
<script src="asset('frontend') }}/assets/js/custom.js"></script>

<!-- Slick Slider CDN Link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<!-- according to loftblog tut -->
<script>
    $('.nav li:first').addClass('active');
    var showSection = function showSection(section, isAnimate) {
      var
      direction = section.replace(/#/, ''),
      reqSection = $('.section').filter('[data-section="' + direction + '"]'),
      reqSectionPos = reqSection.offset().top- 0;

      if (isAnimate) {
        $('body, html').animate({
          scrollTop: reqSectionPos },
        800);
      } else {
        $('body, html').scrollTop(reqSectionPos);
      }

    };
    var checkSection = function checkSection() {
      $('.section').each(function () {
        var
        $this = $(this),
        topEdge = $this.offset().top - 80,
        bottomEdge = topEdge + $this.height(),
        wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
          var
          currentId = $this.data('section'),
          reqLink = $('a').filter('[href*=\\#' + currentId + ']');
          reqLink.closest('li').addClass('active').
          siblings().removeClass('active');
        }
      });
    };

    $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
      if($(e.target).hasClass('external')) {
        return;
      }
      e.preventDefault();
      $('#menu').removeClass('active');
      showSection($(this).attr('href'), true);
    });
    $(window).scroll(function () {
      checkSection();
    });


    // Slick slider hear
    $('.my-slider').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1

        }
      }
    ]
  });
  var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
  var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
  return new bootstrap.Dropdown(dropdownToggleEl)
  })
</script>
<!-- AOS Animeiton  CDN-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

@yield('scripts')
</body>
</html>

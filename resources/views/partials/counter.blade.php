<div data-aos="fade-up"data-aos-duration="1500">
    <section class="section main-banner" id="top" data-section="abt">
      <div id="important" class="important pt-2" >
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="titlepage pb-3">
                <h2>Some <strong class="yellow text-secondary">important </strong>facts</h2>
                <span>luptatum. Libero eligendi molestias iure error animi totam laudantium,</span>
              </div>
            </div>
          </div>
        </div>
        <div class="important_bg py-3">
          <div class="container">
            <div class="row">
                @foreach ($counters as $count)
                    <div class="col col-xs-12">
                        <div class="important_box">
                            <h3>{{ $count->counter }}+</h3>
                            <span>{{ $count->heading }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

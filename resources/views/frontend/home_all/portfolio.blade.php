<!-- portfolio-area -->
<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
 
    </div>
    <div class="tab-content" id="portfolioTabContent">

  @php
      use App\Models\Portfolio;
      $portfolio=Portfolio::all();
  @endphp

        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">


                             @foreach ($portfolio as $item)
                             <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('storage/multi-image/'.$item->image)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$item->name}}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{$item->portfolio_title}}</a></h4>
                                    <a href="portfolio-details.html" class="link">{!! $item->description !!}</a>
                                </div>
                            </div>     
                             @endforeach
                          

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- portfolio-area-end -->
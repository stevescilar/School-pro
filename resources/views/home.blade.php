@extends('layouts.master_home')

@section('home_content')
    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</strong></h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>{{ $abouts->title }}</h2>
            <h3>{{ $abouts->short_des }}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>
              {{ $abouts->long_des}}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</strong></h2>
          <p>We are experts in several areas, below are a few, take a look</p>
        </div>
        
        <div class="row row-cols-1 row-cols-md-4 g-4">
          @foreach($services as $service)
          <div class="col">
            <div class="card h-100">
              <img src="{{ $service->image }}" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">{{$service->title}}</h5>
                <p class="card-text">{{$service->description}}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted"> Updated {{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}</small> 
                <a href="#" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>


      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
        </div>


        <div class="row portfolio-container" data-aos="fade-up">
          @foreach($images as $image)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ $image->image }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="{{ $image->image }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach
          

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
          @foreach($brands as $brand)
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="{{ $brand->brand_image }}" class="img-fluid" alt="">
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Our Clients Section -->
@endsection
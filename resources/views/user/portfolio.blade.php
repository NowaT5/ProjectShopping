@extends('layutsUser.app')

@section('title', 'page')
@section('content')
<main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>ผลงาน</h2>
          <ol>
            <li><a href="{{route('Home')}}">Home</a></li>
            <li>ผลงาน</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">ทั้งหมด</li>
              <li data-filter=".filter-app">หินทั่วไป</li>
              <li data-filter=".filter-card">ทับทิม</li>
              <li data-filter=".filter-web">หยก</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
            <div class="portfolio-item">
              <img src="{{('template/assets/img/portfolio/1.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>อเมทิสต์</h3>
                <div>
                  <a href="{{('template/assets/img/portfolio/1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="อเมทิสต์"><i class="bx bx-plus"></i></a>
                  <a href="{{route('Portfoliodetails')}}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-web">
            <div class="portfolio-item">
              <img src="{{('template/assets/img/portfolio/4.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>หยกพม่า</h3>
                <div>
                  <a href="{{('template/assets/img/portfolio/4.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="หยกพม่า"><i class="bx bx-plus"></i></a>
                  <a href="{{route('Portfoliodetails')}}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
            <div class="portfolio-item">
              <img src="{{('template/assets/img/portfolio/2.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>อควอมารีน</h3>
                <div>
                  <a href="{{('template/assets/img/portfolio/2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="อควอมารีน"><i class="bx bx-plus"></i></a>
                  <a href="{{route('Portfoliodetails')}}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-card">
            <div class="portfolio-item">
              <img src="{{('template/assets/img/portfolio/3.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>ทับทิมแดง</h3>
                <div>
                  <a href="{{('template/assets/img/portfolio/3.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="ทับทิมแดง"><i class="bx bx-plus"></i></a>
                  <a href="{{route('Portfoliodetails')}}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-web">
            <div class="portfolio-item">
              <img src="{{('template/assets/img/portfolio/7.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>หยกเขียว</h3>
                <div>
                  <a href="{{('template/assets/img/portfolio/7.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="หยกเขียว"><i class="bx bx-plus"></i></a>
                  <a href="{{route('Portfoliodetails')}}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
            <div class="portfolio-item">
              <img src="{{('template/assets/img/portfolio/5.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>โรสควอตซ์</h3>
                <div>
                  <a href="{{('template/assets/img/portfolio/5.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="โรสควอตซ์"><i class="bx bx-plus"></i></a>
                  <a href="{{route('Portfoliodetails')}}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-card">
            <div class="portfolio-item">
              <img src="{{('template/assets/img/portfolio/6.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>ฮาวไลท์</h3>
                <div>
                  <a href="{{('template/assets/img/portfolio/6.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="ฮาวไลท์"><i class="bx bx-plus"></i></a>
                  <a href="{{route('Portfoliodetails')}}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-card">
            <div class="portfolio-item">
              <img src="{{('template/assets/img/portfolio/9.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>ยูนาไคต์</h3>
                <div>
                  <a href="{{('template/assets/img/portfolio/9.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="ยูนาไคต์"><i class="bx bx-plus"></i></a>
                  <a href="{{route('Portfoliodetails')}}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-web">
            <div class="portfolio-item">
              <img src="{{('template/assets/img/portfolio/8.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>หยกเขียว</h3>
                <div>
                  <a href="{{('template/assets/img/portfolio/8.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="หยกเขียว"><i class="bx bx-plus"></i></a>
                  <a href="{{route('Portfoliodetails')}}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
@endsection

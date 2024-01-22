@extends('layutsUser.app')

@section('title', 'page')
@section('content')
<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>MU-TAE-CUTE</span></h2>
          <p class="animate__animated animate__fadeInUp"></p>
          {{-- <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a> --}}
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              {{-- <div class="icon"><i class="bx bxl-dribbble"></i></div> --}}
              <h4 class="title"><a href="">หินอเมทิสต์ หินแท้ธรรมชาติ ขนาด 6 มม.</a></h4>
              <img src="{{ asset('template/assets/img/1.jpg') }}" class="img-thumbnail" alt="...">
              <p class="description"> ลูอเมทิสต์ พลังแห่งการบำบัด ปัดเป่าสิ่งชั่วร้าย </p>
              <p class="description"> หินลักษณะสีม่วงเข้ม ใส่เสริมดวงตามวันเกิดได้ ดังนี้</p>
              <p class="description"> วันอาทิตย์ เสริมเรื่องทรัพย์สิน เงินทองมั่นคง</p>
              <p class="description"> วันจันทร์ เสริมเรื่องโชคลาภ การเงิน เมตตามหานิยม</p>
              <p class="description"> วันอังคาร เสริมเรื่องอำนาจ บารมี ชื่อเสียง</p>
              <p class="description"> วันพุธกลางวัน เสริมเรื่องสุขภาพ</p>
              <p class="description"> วันพุธกลางคืน เสริมเรื่องคนอุปถัมภ์ ช่วยเหลือ</p>
              <p class="description"> วันศุกร์ เสริมเรื่องหน้าที่การงาน</p>
              <p class="description"> วันเสาร์ เสริมเรื่องบริวาร เพื่อน ผู้ใต้บังคับบัญชา</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              {{-- <div class="icon"><i class="bx bx-file"></i></div> --}}
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <img src="{{ asset('template/assets/img/2.jpg') }}" class="img-thumbnail" alt="...">

            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              {{-- <div class="icon"><i class="bx bx-tachometer"></i></div> --}}
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <img src="{{ asset('template/assets/img/3.jpg') }}" class="img-thumbnail" alt="...">
            </div>
          </div>

          {{-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <img src="{{ asset('template/assets/img/4.jpg') }}" class="img-thumbnail" alt="...">
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          {{-- <div class="col-lg-6 video-box">
            <img src="assets/img/why-us.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div> --}}

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
    <!-- ======= Features Section ======= -->

  </main><!-- End #main -->
@endsection

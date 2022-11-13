@extends('layouts.customer.landingpage')
@section('container')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 95%">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center pesan">
          <h1>Super Pisang</h1>
          <h2>Aneka Pisang Keju dengan berbagai varian rasa dan toping</h2>
          <div>
            <a href="{{ Route('cus.login') }}" class="button">
              <button>Lanjut</button>
            </a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="img/logo/landing-page.png" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->
@endsection

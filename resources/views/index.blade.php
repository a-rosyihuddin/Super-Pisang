@extends('layouts.customer.main')
@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center pesan">
                    <h1>Super Pisang</h1>
                    <h2>Aneka Pisang Keju dengan berbagai varian rasa dan toping</h2>
                    <div>
                        <a href="{{ Route('cus.login') }}" class="button">
                            <button>Pesan</button>
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

    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>Rekomendasi Menu</h2>
                </div>
                <div class="row">
                    @foreach ($menu as $row)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <div class="member-img">
                                    <img src="{{ $row->foto_menu }}" class="img-fluid" alt="" />
                                </div>
                                <div class="row member-info">
                                    <h4>{{ $row->nama_menu }}</h4>
                                    <span>Rp. {{ $row->harga_menu }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Team Section -->
    </main>
    <!-- End #main -->
@endsection

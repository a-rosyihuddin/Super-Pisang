@extends('layouts.customer.main')
@section('container')
    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">
                <h1>Pesanan di proses</h1>
                <div class="row">
                    @foreach ($order as $row)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <div class="member-img">
                                    <span>Tanggal Order : {{ $row->tgl_order }}</span><br>
                                    <span>ID Order : {{ $row->id }}</span>

                                    {{-- <img src="{{ $row->menu->foto_menu }}" class="img-fluid" alt="" /> --}}
                                </div>
                                <div class="row member-info">
                                    <h4>{{ $row->menu->nama_menu }}</h4>
                                    <span>Rp. {{ $row->menu->harga_menu }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h1>Riwayat Order</h1>
                <div class="row">
                    @foreach ($order as $row)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <div class="member-img">
                                    <span>Tanggal Order : {{ $row->tgl_order }}</span><br>
                                    <span>ID Order : {{ $row->id }}</span>

                                    {{-- <img src="{{ $row->menu->foto_menu }}" class="img-fluid" alt="" /> --}}
                                </div>
                                <div class="row member-info">
                                    <h4>{{ $row->menu->nama_menu }}</h4>
                                    <span>Rp. {{ $row->menu->harga_menu }}</span>
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

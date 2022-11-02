@extends('layouts.customer.main')
@section('container')
    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">
                <center>
                    <div class="card">
                        <h3 class="card-header">Pembayaran Pesanan</h3>
                        <div class="card-body">
                            <h5>Nomor Rekening Virtual Account</h5>
                            <span>881085807433209</span>
                            <br>
                            <br>
                            <span>Scan Barcode QRIS</span><br>
                            <img src="img/qrcode/qris.jpg" style="width: 200px; height: 200px;"><br>
                            <a href="{{ Route('cus.checkoutcomplate') }}" class="btn btn-success"
                                style="width: 100%; margin-top: 20px">Selesai</a>
                        </div>
                    </div>
                </center>
            </div>
        </section>
        <!-- End Team Section -->
    </main>
    <!-- End #main -->
@endsection

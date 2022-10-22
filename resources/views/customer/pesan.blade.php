@extends('layouts.customer.main')
@section('container')
<main id="main">
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
            <div class="card shadow mb-4">
                <h6 class="card-header py-3 m-0 font-weight-bold text-primary">Tambah Pesanan</h6>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="jumlah_pesanan" class="col-sm-2 col-form-label">Jumlah Pesanan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="jumlah_pesanan"
                                    placeholder="Jumlah Pesanan">
                            </div>
                        </div>
                        <div style="margin-top:20px" class="col-sm-2 d-inline">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Team Section -->
</main>
<!-- End #main -->
@endsection

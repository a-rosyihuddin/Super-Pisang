@extends('layouts.kasir.main')
@section('container')

@if (session()->has('pesan'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil</strong> {{ Session::get('pesan') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-lg-7">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="card-title">
                    <form method="POST" action="{{ Route('kasir.CariOrder') }}" class="d-inline">
                        @csrf
                        <div class="input-group rounded mb-2">
                            <input type="search" class="form-control rounded " placeholder="ID Customer"
                                aria-label="Search" aria-describedby="search-addon" name="id_cus" autofocus />
                            <button class="btn btn-primary" id="search-addon" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    @if (session()->has('order'))
                    Nama Customer : {{ session()->get('order')->first()->nama_cus }}
                    @else
                    Nama Customer :
                    @endif
                </div>

                {{-- menampilkan detail pesanan customer --}}
                <table class="mb-0 table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Menu</th>
                            <th>Jumlah Pesanan</th>
                            <th>Sub Harga</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (session()->has('order'))
                        @foreach ( session()->get('order')->first()->orderdetail as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $row->menu->nama_menu }}</td>
                            <td>{{ $row->jml_order }}</td>
                            <td>Rp. {{ $row->sub_total }}</td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="4" align="center">Tidak Ada Order</td>
                        </tr>

                        @php
                        session()->forget('order') //menghapus session order
                        @endphp

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Pembayaran</h5>
                <label for="total">Total Pembayaran : </label>
                @if (session()->has('order'))
                <input class="form-control" type="text"
                    value="Rp. {{ session()->get('order')->first()->total_pembayaran }}" readonly>

                @else
                <input class="form-control" type="text" value=" Rp. 0" readonly>

                @endif
                <form method="POST" action="">
                    @csrf
                    <div class="form-group row mt-2">
                        <label for="jumlahUang" class="col-sm-5 col-form-label">Jumlah Uang</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="jumlahUang" placeholder="Jumlah Uang">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-5 col-form-label">Kembalian</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" placeholder="Rp. 0" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

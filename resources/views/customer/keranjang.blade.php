@extends('layouts.customer.main')
@section('container')
    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">
                <h1>Keranjang Pesanan</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Toping</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderdetail as $row)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <img src="{{ $row[0]->menu->foto_menu }}" class="img-thumbnail"
                                        style="width: 100px; height:100px">
                                </td>
                                <td>{{ $row[0]->menu->nama_menu }}</td>
                                <td>
                                    @foreach ($row as $tp)
                                        {{ $tp->toping->nama_toping }} <br>
                                    @endforeach
                                </td>
                                <td>{{ $row[0]->sub_total }}</td>
                                <td style="width: 10%">
                                    <input type="number" class="form-control" value="{{ $row[0]->jml_order }}"
                                        style="width: 90%">
                                </td>
                                <td>{{ $row[0]->order->total_pembayaran }}</td>
                                <form action="/keranjang/hapus/{{ $row[0]->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td><button class="btn btn-danger fa-solid fa-trash-can"></button></td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="" class="btn btn-primary">Checkout</a>

            </div>
        </section>
        <!-- End Team Section -->
    </main>
    <!-- End #main -->
@endsection

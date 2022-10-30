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
                        {{-- @dd($orderdetail) --}}
                        @php
                            $idMenu = 0;
                        @endphp
                        @foreach ($orderdetail as $row)
                            {{-- @dd($row[0]) --}}
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <img src="{{ $row[0]->menu->foto_menu }}" class="img-thumbnail"
                                        style="width: 100px; height:100px">
                                </td>
                                <td>{{ $row[0]->menu->nama_menu }}</td>
                                <td>
                                    @php
                                        $count = count($row);
                                    @endphp
                                    @foreach ($row as $tp)
                                        {{ $tp->toping->nama_toping }} <br>
                                    @endforeach
                                </td>
                                <td>{{ $row[0]->sub_total }}</td>
                                <td><input type="number" class="form-control" value="{{ $row[0]->jml_order }}"
                                        style="width: 20%"></td>
                                <td>{{ $row[0]->order->total_pembayaran }}</td>
                                <td><a href="" class="btn btn-danger fa-solid fa-trash-can"></i></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- </div> --}}
            </div>
        </section>
        <!-- End Team Section -->
    </main>
    <!-- End #main -->
@endsection

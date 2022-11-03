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
            @if ($order != null && $order->orderdetail->first() != null)
              @foreach ($order->orderdetail as $row)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>
                    <img src="/storage/{{ $row->menu->foto_menu }}" class="img-thumbnail"
                      style="width: 100px; height:100px">
                  </td>
                  <td>{{ $row->menu->nama_menu }}</td>
                  <td>
                    @if ($row->detailtoping->first() != null)
                      @foreach ($row->detailtoping as $dp)
                        <span>{{ $loop->iteration }}. {{ $dp->toping->nama_toping }}</span><br>
                      @endforeach
                    @else
                      <span>Tanpa Toping</span>
                    @endif
                  </td>
                  <td>{{ number_format($row->sub_total, 2, ',', '.') }}</td>
                  <td>{{ $row->jml_order }}</td>
                  <td>{{ number_format($row->sub_total / $row->jml_order, 2, ',', '.') }}</td>
                  <form action="/keranjang/hapus/{{ $row->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <td><button class="btn btn-danger fa-solid fa-trash-can"></button></td>
                  </form>
                </tr>
              @endforeach
              <tr>
                <td colspan="8" style="background-color: rgb(131, 131, 253)">Total Harga : Rp.
                  {{ number_format($row->order->total_pembayaran, 2, ',', '.') }}</td>
              </tr>
            @else
              <tr>
                <td colspan="8">
                  <center>Tidak Ada Pesanan</center>
                </td>
              </tr>
            @endif
          </tbody>
        </table>
        @if ($order != null && $order->orderdetail->first() != null)
          <a href="{{ Route('cus.checkout') }}">
            <button class="btn btn-primary">Checkout</button>
          </a>
        @else
          <button class="btn btn-primary" disabled>Checkout</button>
        @endif

      </div>
    </section>
    <!-- End Team Section -->
  </main>
  <!-- End #main -->
@endsection

@extends('layouts.customer.main')
@section('container')
  <main id="main">
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">
        <h1>Pesanan di proses</h1>
        <div class="row">
          @foreach ($order as $row)
            @if ($row->status_order == 'Proses')
              <div class="col-xl-3 col-sm-6">
                <div class="card" style=" border-radius:1.5rem">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-10">
                        <span class="text-sm mb-0 text-uppercase font-weight-bold">Tanggal Order :
                          {{ $row->tgl_order }}</span><br>
                        <span>ID Order : {{ $row->id }}</span>
                        <p></p>
                        <h5 class="font-weight-bolder">Pesanan</h5>
                        <p class="mb-0">
                        <table style="width: 225px">
                          @foreach ($row->orderdetail as $od)
                            <tr>
                              <td>
                                <span style="color: black">{{ $loop->iteration }}.
                                  {{ $od->menu->nama_menu }}</span>
                              </td>
                              <td> {{ $od->jml_order }}x</td>
                            </tr>
                            <tr>
                              <td>
                                <span style="color: rgb(75, 61, 61)">Extra Toping</span><br>
                                @foreach ($od->detailtoping as $dp)
                                  <span style="color: rgb(53, 32, 32)"> *
                                    {{ $dp->toping->nama_toping }}</span><br>
                                @endforeach
                              </td>
                            </tr>
                          @endforeach
                        </table>
                        </p>
                      </div>
                    </div>
                    <span class="btn btn-secondary" style="width: 100%">Dalam Antrian</span>
                  </div>
                </div>
              </div>
            @elseif ($row->status_order == 'Siap')
              <div class="col-xl-3 col-sm-6">
                <div class="card" style=" border-radius:1.5rem">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-10">
                        <span class="text-sm mb-0 text-uppercase font-weight-bold">Tanggal Order :
                          {{ $row->tgl_order }}</span><br>
                        <span>ID Order : {{ $row->id }}</span>
                        <p></p>
                        <h5 class="font-weight-bolder">Pesanan</h5>
                        <p class="mb-0">
                        <table style="width: 225px">
                          @foreach ($row->orderdetail as $od)
                            <tr>
                              <td>
                                <span style="color: black">{{ $loop->iteration }}.
                                  {{ $od->menu->nama_menu }}</span>
                              </td>
                              <td> {{ $od->jml_order }}x</td>
                            </tr>
                            <tr>
                              <td>
                                <span style="color: rgb(75, 61, 61)">Extra Toping</span><br>
                                @foreach ($od->detailtoping as $dp)
                                  <span style="color: rgb(53, 32, 32)"> *
                                    {{ $dp->toping->nama_toping }}</span><br>
                                @endforeach
                              </td>
                            </tr>
                          @endforeach
                        </table>
                        </p>
                      </div>
                    </div>
                    <span class="btn btn-warning" style="width: 100%">Siap Di Ambil</span>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
          <h1>Riwayat Order</h1>
          <div class="row">
            @if ($order->where('status_order', 'Selesai')->first() != null)
              @foreach ($order->where('status_order', 'Selesai') as $row)
                <div class="col-xl-3 col-sm-6">
                  <div class="card" style=" border-radius:1.5rem">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-10">
                          <span class="text-sm mb-0 text-uppercase font-weight-bold">Tanggal Order :
                            {{ $row->tgl_order }}</span><br>
                          <span>ID Order : {{ $row->id }}</span>
                          <p></p>
                          <h5 class="font-weight-bolder">Pesanan</h5>
                          <p class="mb-0">
                          <table style="width: 225px">
                            @foreach ($row->orderdetail as $od)
                              <tr>
                                <td>
                                  <span style="color: black">{{ $loop->iteration }}.
                                    {{ $od->menu->nama_menu }}</span>
                                </td>
                                <td> {{ $od->jml_order }}x</td>
                              </tr>
                              <tr>
                                <td>
                                  <span style="color: rgb(75, 61, 61)">Extra Toping</span><br>
                                  @foreach ($od->detailtoping as $dp)
                                    <span style="color: rgb(53, 32, 32)"> *
                                      {{ $dp->toping->nama_toping }}</span><br>
                                  @endforeach
                                </td>
                              </tr>
                            @endforeach
                          </table>
                          </p>
                        </div>
                      </div>
                      <span class="btn btn-success" style="width: 100%">Selesai</span>
                    </div>
                  </div>
              @endforeach
            @else
              <center>
                <h3>Tidak Ada Riwayat</h3>
              </center>
            @endif
          </div>
        </div>
    </section>
    <!-- End Team Section -->
  </main>
  <!-- End #main -->
@endsection

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
                            @if ($loop->iteration < 2)
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
                            @endif
                          @endforeach
                        </table>
                        </p>
                      </div>
                    </div>
                    <span class="btn btn-secondary" style="width: 79%">Dalam Antrian</span>
                    <a href="#" class="btn btn-info" data-toggle="modal"
                      data-target="#idPesanan{{ $row->id }}""><i class="fa-solid fa-circle-info"></i></a>
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
                    <span class="btn btn-warning" style="width: 79%">Siap Di Ambil</span>
                    <a href="#" class="btn btn-info" data-toggle="modal"
                      data-target="#idPesanan{{ $row->id }}""><i class="fa-solid fa-circle-info"></i></a>
                  </div>
                </div>
              </div>
            @endif
            <!-- Tambah Modal HTML -->
            <div id="idPesanan{{ $row->id }}" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Detail Order</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-hidden="true"></button>
                  </div>
                  <div class="modal-body" style="flex: 20%">
                    <table style="width: 100%">
                      <th>Menu</th>
                      <th>Jumlah Order</th>
                      <th>Harga</th>
                      @foreach ($row->orderdetail as $od)
                        <tr>
                          <td>
                            <span style="color: black">{{ $loop->iteration }}.
                              {{ $od->menu->nama_menu }}</span>
                          </td>
                          <td> {{ $od->jml_order }}x</td>
                          <td>{{ number_format($od->sub_total / $od->jml_order, 2, ',', '.') }}</td>
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
                      <tr>
                        <td colspan="2" style="background-color: rgb(238, 238, 242)">Total Harga : </td>
                        <td style="background-color: rgb(238, 238, 242)">Rp.
                          {{ number_format($od->order->total_pembayaran, 2, ',', '.') }}</td>
                      </tr>
                    </table>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- Akhir Modal --}}
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
                      <span class="btn btn-success" style="width: 78%">Selesai</span>
                      <a href="#" class="btn btn-info" data-toggle="modal"
                        data-target="#idPesanan{{ $row->id }}""><i class="fa-solid fa-circle-info"></i></a>
                    </div>
                  </div>
                  <!-- Tambah Modal HTML -->
                  <div id="idPesanan{{ $row->id }}" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Detail Order</h4>
                          <button type="button" class="btn btn-close" data-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body" style="flex: 20%">
                          <table style="width: 100%">
                            <th>Menu</th>
                            <th>Jumlah Order</th>
                            <th>Harga</th>
                            @foreach ($row->orderdetail as $od)
                              <tr>
                                <td>
                                  <span style="color: black">{{ $loop->iteration }}.
                                    {{ $od->menu->nama_menu }}</span>
                                </td>
                                <td> {{ $od->jml_order }}x</td>
                                <td>{{ number_format($od->sub_total / $od->jml_order, 2, ',', '.') }}</td>
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
                            <tr>
                              <td colspan="2" style="background-color: rgb(238, 238, 242)">Total Harga : </td>
                              <td style="background-color: rgb(238, 238, 242)">Rp.
                                {{ number_format($od->order->total_pembayaran, 2, ',', '.') }}</td>
                            </tr>
                          </table>
                          <div class="modal-footer">
                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- Akhir Modal --}}
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

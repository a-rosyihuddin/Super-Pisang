@extends('layouts.admin.main')
@section('container')
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Batas Order Masuk</p>
                  <h5 class="font-weight-bolder">
                    {{ $toko->batas_order }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Order Masuk</p>
                  <h5 class="font-weight-bolder">
                    {{ $order->where('status_order', 'Proses')->count() }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Order Siap Di ambil</p>
                  <h5 class="font-weight-bolder">
                    {{ $order->where('status_order', 'Siap')->count() }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-10">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Pendapatan Bulan Ini</p>
                  <h5 class="font-weight-bolder"> Rp.
                    {{ number_format($order->sum('total_pembayaran'), '2', ',', '.') }}
                  </h5>
                </div>
              </div>
              {{-- <div class=""> --}}
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="fa-solid fa-money-bill-1-wave fa-2x"></i>
              </div>
              {{-- </div> --}}
            </div>
          </div>
        </div>
      </div>

      @foreach ($order as $row)
        @if ($row->status_order == 'Proses')
          <div class="col-xl-3 col-sm-6" style="margin-top:5%">
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
                    <table style="width: 190px">
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
                <a href="/admin/updatestatus/{{ $row->id }}" class="btn btn-success" style="width: 100%">Selesai</a>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  @endsection

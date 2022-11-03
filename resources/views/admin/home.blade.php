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
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Order Masuk Hari Ini</p>
                                    <h5 class="font-weight-bolder">
                                        $53,000
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                                        since yesterday
                                    </p>
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
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Order Siap Diambil</p>
                                    <h5 class="font-weight-bolder">
                                        2,300
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
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
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pendapatan Hari Ini</p>
                                    <h5 class="font-weight-bolder">
                                        +3,462
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                        since last quarter
                                    </p>
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
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pendapatan Bulan Ini</p>
                                    <h5 class="font-weight-bolder">
                                        $103,430
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
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
                                <a href="/admin/setsiap/{{ $od->id }}"><span class="btn btn-success"
                                        style="width: 100%">Selesai</span></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endsection

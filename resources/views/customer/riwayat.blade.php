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
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="member" style="width: 100%">
                                    <span>Tanggal Order : {{ $row->tgl_order }}</span><br>
                                    <span>ID Order : {{ $row->id }}</span>
                                    <div class="row member-info">
                                        <h5>Pesanan</h5>
                                        <table style="margin-left: 5%">
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
                                                        <span style="color: rgb(75, 61, 61)">Extra Toping</span>
                                                        @foreach ($od->detailtoping as $dp)
                                                            <span style="color: rgb(53, 32, 32)"> *
                                                                {{ $dp->toping->nama_toping }}</span>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </table>
                                        {{-- @foreach ($row->orderdetail as $od)
                                            <span style="color: black">{{ $loop->iteration }}.
                                                {{ $od->menu->nama_menu }} > {{ $od->jml_order }} Porsi</span>
                                            <span style="color: rgb(75, 61, 61)">Extra Toping</span>
                                            @foreach ($od->detailtoping as $dp)
                                                <span style="color: rgb(53, 32, 32)"> *
                                                    {{ $dp->toping->nama_toping }}</span>
                                            @endforeach
                                        @endforeach --}}
                                    </div>
                                    <span class="btn btn-secondary" style="width: 100%">Dalam Antrian</span>
                                </div>
                            </div>
                        @elseif ($row->status_order == 'Siap')
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <span>Tanggal Order : {{ $row->tgl_order }}</span><br>
                                    <span>ID Order : {{ $row->id }}</span>
                                    <div class="row member-info">
                                        <h5>Pesanan</h5>
                                        @foreach ($row->orderdetail as $od)
                                            <span style="color: black">{{ $loop->iteration }}.
                                                {{ $od->menu->nama_menu }} > {{ $od->jml_order }} Porsi</span>
                                            <span style="color: rgb(75, 61, 61)">Extra Toping</span>
                                            @foreach ($od->detailtoping as $dp)
                                                <span style="color: rgb(53, 32, 32)"> *
                                                    {{ $dp->toping->nama_toping }}</span>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <span class="btn btn-warning" style="width: 100%">Siap Di Ambil</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <h1>Riwayat Order</h1>
                <div class="row">
                    {{-- @forelse ($order as $row)
                        @if ($row->status_order == 'Selesai')
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <span>Tanggal Order : {{ $row->tgl_order }}</span><br>
                                    <span>ID Order : {{ $row->id }}</span>
                                    <div class="row member-info">
                                        <h5>Pesanan</h5>
                                        @foreach ($row->orderdetail as $od)
                                            <span style="color: black">{{ $loop->iteration }}.
                                                {{ $od->menu->nama_menu }} > {{ $od->jml_order }} Porsi</span>
                                            <span style="color: rgb(75, 61, 61)">Extra Toping</span>
                                            @foreach ($od->detailtoping as $dp)
                                                <span style="color: rgb(53, 32, 32)"> *
                                                    {{ $dp->toping->nama_toping }}</span>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <span class="btn btn-success" style="width: 100%">Selesai</span>
                                </div>
                            </div>
                        @empty
                            <center>Tidak Ada Riwayat</center>
                        @endif
                    @endforelse --}}
                    @if ($order->where('status_order', 'Selesai')->first() != null)
                        @foreach ($order->where('status_order', 'Selesai') as $row)
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <span>Tanggal Order : {{ $row->tgl_order }}</span><br>
                                    <span>ID Order : {{ $row->id }}</span>
                                    <div class="row member-info">
                                        <h5>Pesanan</h5>
                                        @foreach ($row->orderdetail as $od)
                                            <span style="color: black">{{ $loop->iteration }}.
                                                {{ $od->menu->nama_menu }} > {{ $od->jml_order }} Porsi</span>
                                            <span style="color: rgb(75, 61, 61)">Extra Toping</span>
                                            @foreach ($od->detailtoping as $dp)
                                                <span style="color: rgb(53, 32, 32)"> *
                                                    {{ $dp->toping->nama_toping }}</span>
                                            @endforeach
                                        @endforeach
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

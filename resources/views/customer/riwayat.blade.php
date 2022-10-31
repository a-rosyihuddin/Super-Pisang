@extends('layouts.customer.main')
@section('container')
    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">
                <h1>Pesanan di proses</h1>
                <div class="row">
                    @php
                        $i1 = 1;
                        $i2 = 1;
                    @endphp
                    @foreach ($order as $row)
                        @if ($row->status_order == 'Proses')
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <span>Tanggal Order : {{ $row->tgl_order }}</span><br>
                                    <span>ID Order : {{ $row->id }}</span>
                                    <div class="row member-info">
                                        <h5>Pesanan</h5>
                                        @php
                                            $orderdetail = $row->orderdetail;
                                            $oldDate = '';
                                        @endphp

                                        @foreach ($orderdetail as $tp)
                                            @if ($tp->created_at != $oldDate)
                                                <span style="color: black">{{ $i1++ }}.
                                                    {{ $tp->menu->nama_menu }} > {{ $tp->jml_order }} Porsi</span>
                                                <span style="color: rgb(75, 61, 61)">Extra Toping</span>
                                                @php
                                                    $oldDate = $tp->created_at;
                                                @endphp
                                            @endif
                                            <span style="color: rgb(53, 32, 32)"> *
                                                {{ $tp->toping->nama_toping }}</span>
                                        @endforeach

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
                                        @php
                                            $orderdetail = $row->orderdetail;
                                            $oldDate = '';
                                        @endphp

                                        @foreach ($orderdetail as $tp)
                                            @if ($tp->created_at != $oldDate)
                                                <span style="color: black">{{ $i2++ }}.
                                                    {{ $row->orderdetail[0]->menu->nama_menu }}</span>
                                                <span style="color: rgb(75, 61, 61)">Extra Toping</span>
                                                @php
                                                    $oldDate = $tp->created_at;
                                                @endphp
                                            @endif
                                            <span style="color: rgb(53, 32, 32)"> *
                                                {{ $tp->toping->nama_toping }}</span>
                                        @endforeach

                                    </div>
                                    <span class="btn btn-success" style="width: 100%">Pesanan Siap</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <h1>Riwayat Order</h1>
                <div class="row">
                    @foreach ($order as $row)
                        {{-- @dd($row->status_order == 'Selesai') --}}
                        @if ($row->status_order == 'Selesai')
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <div class="member-img">
                                        <span>Tanggal Order : {{ $row->tgl_order }}</span><br>
                                        <span>ID Order : {{ $row->id }}</span>
                                    </div>
                                    <div class="row member-info">
                                        <h4>Pesanan</h4>
                                        {{-- <h4>{{ $row[0]->menu->nama_menu }}</h4> --}}
                                        <span>Rp. {{ $row->orderdetail[0]->menu->harga_menu }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <center>Tidak Ada Riwayat</center>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Team Section -->
    </main>
    <!-- End #main -->
@endsection

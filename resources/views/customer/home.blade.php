@extends('layouts.customer.main')
@section('container')
    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">
                <div class="section-title">
                    <form class="form-inline ">
                        <div class="input-field search">
                            <span class="fas fa-search px-2"></span>
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                        </div>
                    </form>

                </div>
                <div class="row">
                    <div class="row">
                        {{-- Menampilkan Menu dari database --}}
                        @foreach ($menu as $row)
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <a href="#" data-toggle="modal" data-target="#idMenu{{ $row->id }}">
                                    <div class="member">
                                        <div class="member-img">
                                            <img src="{{ $row->foto_menu }}" class="img-fluid" alt="" />
                                        </div>
                                        <div class="row member-info">
                                            <h4>{{ $row->nama_menu }}</h4>
                                            <span>Rp. {{ $row->harga_menu }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Tambah Modal HTML -->
                            <div id="idMenu{{ $row->id }}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Silah Masukan Pesanan Anda</h4>
                                            <button type="button" class="btn btn-close" data-dismiss="modal"
                                                aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body" style="flex: 20%">
                                            {{-- <table> --}}
                                            <form action="{{ Route('cus.pesan') }}" method="POST">
                                                @csrf
                                                <label for="toping">Toping</label><br>
                                                {{-- Menampilkan Toping --}}
                                                <div data-toggle="buttons">
                                                    @foreach ($toping as $tp)
                                                        <label class="btn btn-block btn-success active""
                                                            style="margin: 1%">{{ $tp->nama_toping }}
                                                            <input type="checkbox" name="{{ $tp->nama_toping }}"
                                                                autocomplete="off">
                                                        </label>
                                                    @endforeach
                                                </div>
                                                <br>
                                                <label for="jml_order">Jumlah</label>
                                                <input type="number" class="form-control" name="total_order">
                                                <input type="hidden" class="form-control" name="id_menu"
                                                    value="{{ $row->id }}">
                                                <button type="submit" class="btn btn-primary"
                                                    style="margin-top:2%; margin-bottom : 2%;">Tambah</button>
                                            </form>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-danger" data-dismiss="modal"
                                                    value="Close" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Team Section -->
    </main>
    <!-- End #main -->
@endsection

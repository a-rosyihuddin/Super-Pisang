@extends('layouts.admin.main')
@section('container')
  @if (session()->has('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Berhasil</strong> {{ Session::get('pesan') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="row">
    @foreach ($order as $row)
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
            <a href="/admin/updatestatus/{{ $row->id }}" class="btn btn-success" style="width: 100%">Telah Di Ambil</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection

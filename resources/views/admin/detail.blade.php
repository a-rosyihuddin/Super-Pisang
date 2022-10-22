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
<div class="main-card mb-3 card">
    <div class="card-header">
        ID Order : {{ $id_order }}
    </div>
    <div class="card-body">
        <table class="mb-0 table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Jumlah Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetail->first()->orderdetail as $row )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->menu->nama_menu }}</td>
                    <td>{{ $row->menu->kategori }}</td>
                    <td>{{ $row->jml_order }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

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
    <div class="card-body">
        <table class="mb-0 table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Customer</th>
                    <th>Nomor Meja</th>
                    <th>Detail Pesanan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($orders) --}}
                @foreach ($orders as $row )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->nama_cus }}</td>
                    <td>{{ $row->no_meja }}</td>
                    <td><a href="/admin/detail/{{ $row->id }}" class="btn btn-primary">Detail
                            Order</a></td>
                    <td>
                        <form action="/admin/ordercomplate/{{ $row->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary">Complated</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

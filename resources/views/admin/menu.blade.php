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
                    <th>Foto Menu</th>
                    <th>Nama Menu</th>
                    <th>Deskripsi</th>
                    <th>Jenis Menu</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu as $row )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset($row->foto_menu)}}" class="img-thumbnail" style="width: 100px; height:100px">
                    </td>
                    <td>{{ $row->nama_menu }}</td>
                    <td>{{ $row->deskripsi_menu }}</td>
                    <td>{{ $row->kategori }}</td>
                    <td>{{ $row->harga_menu }}</td>
                    <td>{{ $row->stock }}</td>
                    <td>
                        <a class="btn btn-primary" href="/admin/{{ $row->id }}/edit">Edit</a>
                        <form action="/admin/hapus/{{ $row->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

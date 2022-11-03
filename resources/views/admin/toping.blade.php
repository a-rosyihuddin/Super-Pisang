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
            <th>Nama Menu</th>
            <th>Status</th>
            <th>Harga</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($toping as $row)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $row->nama_toping }}</td>
              <td>{{ $row->status }}</td>
              <td>{{ $row->harga }}</td>
              <td>
                <a class="btn btn-primary" href="/admin/{{ $row->id }}/edittoping">Edit</a>
                <form action="/admin/hapusToping/{{ $row->id }}" method="POST" class="d-inline">
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

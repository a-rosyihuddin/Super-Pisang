@extends('layouts.admin.main')
@section('container')
  <div class="main-card mb-3 card">
    <div class="card-body">
      <form method="POST" action="{{ Route('admin.actionTambahToping') }}">
        @csrf
        <div class="position-relative row form-group">
          <label for="namaToping" class="col-sm-2 col-form-label">Nama Toping</label>
          <div class="col-sm-10">
            <input name="nama_toping" id="namaToping" placeholder="Masukkan Nama Toping" type="text"
              class="form-control @error('nama_toping') is-invalid @enderror" value="{{ old('nama_toping') }}">
            @error('nama_toping')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="position-relative row form-group">
          <label for="statusToping" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <select name="status" id="statusToping" placeholder="Masukkan Status Toping" type="text"
              class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
              <option value="-Pilih-" id="">--Pilih--</option>
              <option value="Ready" id="">Tersedia</option>
              <option value="Sold" id="">Habis</option>
            </select>
            @error('status')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="position-relative row form-group">
          <label for="hargaToping" class="col-sm-2 col-form-label">Harga Toping</label>
          <div class="col-sm-10">
            <input name="harga" id="hargaToping" placeholder="Masukkan Harga Menu" type="number"
              class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
            @error('harga_toping')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="position-relative row form-check">
          <div class="col-sm-10 offset-sm-2">
            <button class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="{{ Route('admin.ViewToping') }}">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

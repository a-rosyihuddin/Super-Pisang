@extends('layouts.admin.main')
@section('container')
<div class="main-card mb-3 card">
    <div class="card-body">
        <form method="POST" action="{{ Route('admin.ActionFormUpdate',$menu->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="position-relative row form-group">
                <input name="oldFotoMenu" type="hidden" class="form-control" value="{{ $menu->foto_menu }}">
                <label for="namaMenu" class="col-sm-2 col-form-label">Nama Menu</label>
                <div class="col-sm-10">
                    <input name="nama_menu" id="namaMenu" placeholder="Masukkan Nama Menu" type="text"
                        class="form-control @error('nama_menu') is-invalid @enderror"
                        value="{{ old('nama_menu',$menu->nama_menu) }}">
                    @error('nama_menu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="deskripsi_menu" class="col-sm-2 col-form-label">Deskripsi Menu</label>
                <div class="col-sm-10">
                    <textarea name="deskripsi_menu" id="desMenu" placeholder="Masukkan Deskripsi Menu"
                        class="form-control @error('deskripsi_menu') is-invalid @enderror">{{ old('deskripsi_menu',$menu->deskripsi_menu) }}</textarea>
                    @error('deskripsi_menu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="hargaMenu" class="col-sm-2 col-form-label">Harga Menu</label>
                <div class="col-sm-10">
                    <input name="harga_menu" id="hargaMenu" placeholder="Masukkan Harga Menu" type="number"
                        class="form-control @error('harga_menu') is-invalid @enderror"
                        value="{{ old('harga_menu',$menu->harga_menu) }}">
                    @error('harga_menu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="StorckMenu" class="col-sm-2 col-form-label">Stock Menu</label>
                <div class="col-sm-10">
                    <input name="stock" id="StockMenu" placeholder="Masukkan Stock Menu" type="number"
                        class="form-control @error('stock') is-invalid @enderror"
                        value="{{ old('stock',$menu->stock) }}">
                    @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="customFile" class="col-sm-2 col-form-label">Foto Menu</label>
                <div class="col-sm-10">
                    <input name="foto_menu" class="form-control" type="file" id="customFile">
                    <small class="form-text text-muted">Masukkan foto dengan resolusi HD dengan ukuran 1:1</small>
                </div>
            </div>
            <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href="{{ Route('admin.ViewMenu') }}">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

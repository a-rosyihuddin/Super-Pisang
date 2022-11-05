@extends('layouts.customer.main')
@section('container')
  <main id="main">
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">
        <div class="card">
          <h3 class="card-header">Account Setting</h3>
          <div class="card-body">
            <table class="table">
              <form action="/{{ $user->id }}/editAkunAction" method="POST">
                @csrf
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td> <input type="text" value="{{ $user->nama }}" class="form-control" name="nama"></td>
                </tr>
                <tr>
                  <td>Nomor Hp</td>
                  <td style="width: 0.5px">:</td>
                  <td><input type="text" value="{{ $user->no_hp }}" class="form-control" name="no_hp"></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="submit" class="btn btn-warning">Simpan</button>
                    <a href="{{ Route('cus.account') }}" class="btn btn-danger">Batal</a>
                  </td>
                </tr>
              </form>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- End Team Section -->
  </main>
  <!-- End #main -->
@endsection

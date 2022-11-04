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
              <tr>
                <td>Nama</td>
                <td>: {{ $user->nama }}</td>
              </tr>
              <tr>
                <td>Nomor Hp</td>
                <td>: {{ $user->no_hp }}</td>
              </tr>
              <tr>
                <td colspan="2">
                  <a href="/{{ $user->id }}/editAkun" class="btn btn-warning">Edit Akun</a>
                  <a href="/hapusakun/{{ $user->id }}" class="btn btn-danger">Hapus Akun</a>
                  <a href="{{ Route('cus.logout') }}" class="btn btn-dark">Keluar</a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- End Team Section -->
  </main>
  <!-- End #main -->
@endsection

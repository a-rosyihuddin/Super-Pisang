@extends('layouts.customer.main');
@section('container')
  ;
  <div class="container-login">
    <div class="row">
      <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
        <div class="panel border bg-white">
          <div class="panel-heading">
            <h2 class="pt-3 font-weight-bold">Register</h2>
          </div>
          <div class="panel-body p-3">
            <form action="{{ Route('cus.regisAction') }}" method="POST">
              @csrf
              <table>
                <tr>
                  <td>Nama</td>
                  <td>
                    <div class="input-field mb-1 mt-1">
                      <input type="text" placeholder="Nama" name="nama" required>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Nomor Handphone</td>
                  <td>
                    <div class="input-field mb-1 mt-1">
                      <input type="text" placeholder="Nomor Handphone" name="no_hp" required>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Password</td>
                  <td>
                    <div class="input-field mb-2 mt-2">
                      <input type="password" placeholder="Password" name="password" required>
                      </input>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <span>Alrady Have Acount? <a href="{{ Route('cus.login') }}">Login</a></span>
                  </td>
                </tr>
              </table>
              <button class="btn btn-primary btn-block mt-3" name="masuk" type="submit">Daftar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

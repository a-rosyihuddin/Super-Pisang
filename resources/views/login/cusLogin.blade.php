@extends('layouts.customer.main');
@section('container')
    ;
    <div class="container-login">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h2 class="pt-3 font-weight-bold">Login</h2>
                    </div>
                    <div class="panel-body p-3">
                        <form action="{{ Route('cus.action') }}" method="POST">
                            @csrf
                            @error('userLoginError')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <table>
                                <tr>
                                    <td>Nomor Handphone</td>
                                    <td>
                                        <div class="input-field mb-1 mt-1">
                                            <span class="fa-solid fa-user px-2"></span>
                                            <input type="text" placeholder="Nomor Handphone" name="no_hp" required>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Password</td>
                                    <td>
                                        <div class="input-field mb-2 mt-2">
                                            <span class="fas fa-lock px-2"></span>
                                            <input type="password" placeholder="Password" name="password" required>
                                            </input>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span>Create Your Account <a href="{{ Route('cus.regis') }}">Register</a></span>
                                    </td>
                                </tr>
                            </table>
                            <button class="btn btn-primary btn-block mt-3" name="masuk" type="submit">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

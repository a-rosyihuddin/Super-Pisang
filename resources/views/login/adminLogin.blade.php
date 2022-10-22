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

                    <form action="/admin/login" method="POST">
                        @csrf
                        <table>
                            <tr>
                                <td>Username</td>
                                <td>
                                    @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="input-field mb-4 mt-4">
                                        <span class="far fa-user px-2"></span>
                                        <input type="text" placeholder="Enter Username" name="username" required
                                            autofocus value="{{ old('username') }}">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Password</td>
                                <td>
                                    <div class="input-field">
                                        <span class="fas fa-lock px-2"></span>
                                        <input type="password" placeholder="Enter Password" name="password" required>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-primary btn-block mt-3" type="submit">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    <div class="input-field mb-4 mt-4">
                                        <span class="far fa-user px-2"></span>
                                        <input type="text" placeholder="Nomor Handphone" name="nama_cus" required>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>No Meja</td>
                                <td>
                                    <div class="input-field">
                                        <span class="fas fa-lock px-2"></span>
                                        <select type="text" placeholder="Nomor Handphone" name="no_meja" required
                                            class="form-select form-select-sm">
                                            <option value="">--No Meja--</option>
                                            @foreach ($meja as $nomor)
                                            <option value="{{ $nomor->no_meja }}">{{ $nomor->no_meja }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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

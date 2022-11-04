<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
use App\Models\User;
use App\Models\Order;
use App\Models\Toping;
use App\Models\OrderDetail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\Node\FunctionNode;

class CustomerController extends Controller
{
    public function login()
    {
        return View('login.cusLogin', ['title' => 'Login']);
    }

    public function storeLogin(StoreCustomerRequest $request)
    {
        $credentials = $request->validate([
            'no_hp' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('cus.home'));
        }

        return back()->withErrors(['userLoginError' => 'Nomor atau Password anda salah']);
    }

    public function regis()
    {
        return View('login.cusRegis', ['title' => 'Register']);
    }

    public function storeRegis(StoreUserRequest $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required |unique:users,no_hp,id',
            'password' => 'required'
        ]);
        $data['level'] = 'Customer';
        $data['password'] = Hash::make($request->password);
        $data['toko_id'] = 1;
        User::create($data);
        return redirect()->route('cus.login');
    }

    public function home()
    {
        return View('customer.home',  [
            'title' => 'Dashboard',
            'menu' => Menu::all(),
            'toping' => Toping::all(),
            'totalOrder' => Order::where('status_order', 'Proses')->get()->count(),
            'batasOrder' => Toko::first()->batas_order
        ]);
    }

    public function logout()
    {
        auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect()->route('cus.login');
    }

    public function keranjang()
    {
        return View('customer.keranjang', [
            'title' => 'Keranjang',
            'order' => Order::where('user_id', Auth::user()->id)->where('status_order', 'Keranjang')->first(),
            'totalOrder' => Order::where('status_order', 'Proses')->get()->count(),
            'batasOrder' => Toko::first()->batas_order
        ]);
    }

    public function checkout()
    {
        return View('customer.checkout', [
            'title' => 'Pembayaran'
        ]);
    }

    public function checkoutcomplate()
    {
        Order::updateStatusOrder('Proses');
        return redirect()->intended(route('cus.home'));
    }

    public function riwayat()
    {
        return View('customer.riwayat', [
            'title' => 'Riwayat Order',
            'order' => Order::getRiwayat(Auth::user()->id),
        ]);
    }

    public function hapusKeranjang(OrderDetail $orderdetail)
    {
        OrderDetail::where('id', $orderdetail->id)->delete();
        return redirect()->route('cus.keranjang');
    }

    public function account()
    {
        return View('customer.account', [
            'title' => 'Account',
            'user' => Auth::user()
        ]);
    }

    public function hapusAkun(User $user)
    {
        $user->delete();
        return redirect()->route('cus.login');
    }

    public function editAkun(User $user)
    {
        return View('customer.editAccount', [
            'title' => 'Edit Akun',
            'user' => $user
        ]);
    }


    public function editAkunAction(StoreUserRequest $request, User $user)
    {
        // $data = $request->validate([
        //     'no_hp' => 'required',
        // $data = [
        //     'nama' => $request->nama,
        //     'no_hp' => $request->no_hp,
        //     'level' => 'Customer'
        // ];

        // $data['level'] = 'Customer';
        // $data['password'] = Hash::make($request->password);
        // $data['toko_id'] = 1;
        dd($request->password);
        User::where('id', $user->id)->first()->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'level' => 'Customer'
        ]);
        return redirect()->route('cus.account');
    }
}

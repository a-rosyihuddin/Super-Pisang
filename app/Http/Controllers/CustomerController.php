<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Toping;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\OrderDetail;
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

    public function home()
    {
        return View('customer.home',  [
            'title' => 'Dashboard',
            'menu' => Menu::all(),
            'toping' => Toping::all()
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
        return View('customer.home',  [
            'title' => 'Dashboard',
            'menu' => Menu::all(),
            'toping' => Toping::all()
        ]);
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
}

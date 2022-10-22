<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Menu;
use App\Models\Customer;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function login()
    {
        $meja = Meja::where('status_meja', 'kosong')->get();
        return View('login.cusLogin', compact('meja'), ['title' => 'Login']);
    }

    public function store(StoreCustomerRequest $request)
    {
        $credentials = $request->validate([
            'nama_cus' => 'required',
            'no_meja' => 'required'
        ]);

        $request->session()->regenerate();
        $request->session()->put('nama_cus', $request->nama_cus);
        $request->session()->put('no_meja', $request->no_meja);
        return redirect()->intended(route('cus.home'));
    }

    public function home()
    {
        $menu = Menu::all();
        return View('customer.home', compact('menu'), ['title' => 'Dashboard']);
    }

    public function logout()
    {
        session()->forget('nama_cus');
        return redirect()->route('cus.login');
    }
}

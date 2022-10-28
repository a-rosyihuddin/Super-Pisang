<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Menu;
use App\Models\Customer;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Auth;
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
        $menu = Menu::all();
        return View('customer.home', compact('menu'), ['title' => 'Dashboard']);
    }

    public function logout()
    {
        auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect()->route('cus.login');
    }
}

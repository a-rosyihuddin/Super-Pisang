<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{

    public function adminhome()
    {
        return View('admin.home', [
            'title' => 'Dashboard | Admin',
            'judul' => 'Dashboard',
            'order' => Order::all(),
            'toko' => Toko::first(),
            // 'total_order' => Order::
        ]);
    }

    public function loginAdmin()
    {
        return View('login.adminLogin', ['title' => 'Admin | Login']);
    }

    public function adminAction(Request $request)
    {
        $credentials = $request->validate([
            'no_hp' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.home'));
        }

        return back()->withErrors(['adminLoginError' => 'Username Atau Password Salah']);
    }

    public function logout()
    {
        auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect()->route('admin.login');
    }
}

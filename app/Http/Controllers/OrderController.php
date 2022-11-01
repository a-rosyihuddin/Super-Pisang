<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\DetailToping;
use App\Models\Toping;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function riwayat()
    {
        $riwayat = Order::where('status_order', 'Proses')->get();
        return View('admin.riwayatOrder', compact('riwayat'), [
            'title' => 'Riwayat Orders | Admin',
            'judul' => 'Riwayat Orders',
            'back' => 'admin.RiwayatOrder'
        ]);
    }


    public function orders()
    {
        $orders = Order::where('status_order', 'Proses')->get();
        return View('admin.orderMasuk', compact('orders'), [
            'title' => 'Orders | Admin',
            'judul' => 'Orders',
            'back' => 'admin.OrderMasuk'
        ]);
    }


    public function pesan(StoreOrderRequest $request)
    {
        $request->validate([
            'total_order' => 'required'
        ]);

        // session()->forget('id_order');
        // dd(session()->get('id_order'));
        $sub_total = $request->total_order * Menu::getHarga($request->id_menu)->first()->harga_menu;
        dd(Toping::getHarga($request->toping));
        if (Session::get('id_order') == null) {
            $id = Order::count() + 1;
            session(['id_order' => $id]);
            Order::create([
                'id' => $id,
                'user_id' => $request->user()->id,
                'total_order' => $request->total_order,
                'total_pembayaran' => $sub_total,
                'tgl_order' => date('Y-m-d'),
                'status_order' => 'Keranjang'
            ]);
        }

        $id_order = Session::get('id_order');
        $orderdetail_id = OrderDetail::count() + 1;
        OrderDetail::create([
            'id' => $orderdetail_id,
            'order_id' => $id_order,
            'menu_id' => $request->id_menu,
            'jml_order' => $request->total_order,
            'sub_total' => $sub_total
        ]);
        for ($i = 0; $i < count($request->toping); $i++) {
            DetailToping::create([
                'orderdetail_id' => $orderdetail_id,
                'toping_id' => $request->toping[$i]

            ]);
        }

        return redirect()->route('cus.home');
    }


    public function cariorder(StoreOrderRequest $request)
    {
        $order = Order::where('id', $request->id_cus)->with(['orderdetail.menu'])->get();

        if (count($order)) {
            return redirect()->route('kasir.home')->with(compact('order'));
        } else {
            return redirect()->route('kasir.home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

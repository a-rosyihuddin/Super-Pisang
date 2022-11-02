<?php

namespace App\Http\Controllers;

use id;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Toping;
use App\Models\OrderDetail;
use App\Models\DetailToping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

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

        // dd($request->toping);
        $orderdetail_id = OrderDetail::count() + 1;
        $sub_total = OrderDetail::getSubTotal($request->toping, $request->total_order, $request->id_menu);
        $id = Order::count() + 1;
        if (Auth::user()->order->where('status_order', 'Keranjang')->first() == null) {
            // dd('tes');
            Order::create([
                'id' => $id,
                'user_id' => $request->user()->id,
                'total_order' => $request->total_order,
                'total_pembayaran' => $sub_total,
                'tgl_order' => date('Y-m-d'),
                'status_order' => 'Keranjang'
            ]);
            session()->put(['id_order' => $id]);
        }

        if (Auth::user()->order->where('status_order', 'Keranjang')->first() != null) {
            $id_order = Auth::user()->order->where('status_order', 'Keranjang')->first()->id;
        } else {
            $id_order = session()->get('id_order');
        }

        OrderDetail::create([
            'id' => $orderdetail_id,
            'order_id' => $id_order,
            'menu_id' => $request->id_menu,
            'jml_order' => $request->total_order,
            'sub_total' => $sub_total
        ]);
        if ($request->toping != null) {
            for ($i = 0; $i < count($request->toping); $i++) {
                DetailToping::create([
                    'order_detail_id' => $orderdetail_id,
                    'toping_id' => $request->toping[$i]
                ]);
            }
        }

        Order::updateTotalPembayaran($id_order);

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

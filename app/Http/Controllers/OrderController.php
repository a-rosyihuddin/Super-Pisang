<?php

namespace App\Http\Controllers;

use id;
use App\Models\Menu;
use App\Models\Toko;
use App\Models\Order;
use App\Models\Toping;
use App\Models\OrderDetail;
use App\Models\DetailToping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\StoreTokoRequest;
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
        return View('admin.riwayatOrder', [
            'title' => 'Riwayat Orders | Admin',
            'judul' => 'Riwayat Orders',
            'back' => 'admin.RiwayatOrder',
            'order' => Order::where('status_order', 'Selesai')->get()
        ]);
    }


    public function orders()
    {
        return View('admin.orderMasuk', [
            'title' => 'Order | Admin',
            'judul' => 'Pesanan Siap Di Ambil',
            'back' => 'admin.OrderMasuk',
            'order' => Order::where('status_order', 'Siap')->get()
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

    public function setStatusSiap(Order $order)
    {
        if ($order->status_order == 'Proses') {
            $order->update(['status_order' => 'Siap']);
            return redirect()->route('admin.home');
        } elseif ($order->status_order == 'Siap') {
            $order->update(['status_order' => 'Selesai']);
            return redirect()->route('admin.OrderMasuk');
        }
    }

    public function updateBatasOrder(StoreTokoRequest $request, Toko $toko)
    {
        // dd($request->batas_order);
        $toko->update(['batas_order' => $request->batas_order]);
        return redirect()->route('admin.home');
    }
}

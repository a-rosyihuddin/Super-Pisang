<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getRiwayat($user_id)
    {
        return Order::where('user_id', $user_id)->get();
    }

    public static function updateTotalPembayaran($id_order)
    {
        $total_pembayaran = 0;
        $harga = OrderDetail::where('order_id', $id_order)->get();
        foreach ($harga as $hg) {
            $total_pembayaran += $hg->sub_total;
        }
        Order::where('id', $id_order)->update(['total_pembayaran' => $total_pembayaran]);
    }

    public static function updateStatusOrder($status)
    {
        Order::where('user_id', Auth::user()->id)->where('status_order', 'Keranjang')->first()->update(['status_order' => $status]);
    }
}

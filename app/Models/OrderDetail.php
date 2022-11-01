<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function detailtoping()
    {
        return $this->hasMany(DetailToping::class);
    }

    public static function getNewOrder()
    {
        return DB::table('Orders')->select('id')->orderByDesc('id')->limit(1);
    }

    public static function getTotalPembayaran($id_orderdetail, $id_order)
    {
        dd(OrderDetail::where('id', $id_orderdetail)->get());
        $harga = array_sum(OrderDetail::where('id', $id_orderdetail)->get());
        Order::where('id', $id_order)->update(['harga' => $harga]);
    }
}

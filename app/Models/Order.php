<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getRiwayat()
    {
        return Order::where('user_id', auth()->user()->id)->get();
    }


    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

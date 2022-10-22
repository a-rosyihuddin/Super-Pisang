<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function meja()
    {
        return $this->hasMany(Meja::class, 'no_meja', 'no_meja');
    }


    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class, 'id_order', 'id');
    }
}

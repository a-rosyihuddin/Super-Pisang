<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function menu()
    // {
    //     return $this->belongsTo(Menu::class);
    // }


    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

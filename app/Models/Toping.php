<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toping extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

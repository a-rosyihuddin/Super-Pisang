<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailToping extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orderdetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }
    public function toping()
    {
        return $this->belongsTo(Toping::class);
    }
}

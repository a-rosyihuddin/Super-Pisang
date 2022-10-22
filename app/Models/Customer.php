<?php

namespace App\Models;

use App\Models\Customer as ModelsCustomer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasMany(Order::class, 'id_customer', 'id');
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja', 'id');
    }

    public function tambah($request)
    {
        $meja = Meja::where('no_meja', $request->no_meja)->first();
    }
}

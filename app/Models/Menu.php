<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public static function getHarga($id_menu)
    {
        return DB::table('menus')->select('harga_menu')->where('id', $id_menu)->get();
    }

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

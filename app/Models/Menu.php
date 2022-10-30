<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public static function menuFav()
    {
        return DB::table('menus')->select('nama_menu', 'harga_menu', 'foto_menu')->limit(4)->get();
    }
    public static function getHarga($id_menu)
    {
        return DB::table('menus')->select('harga_menu')->where('id', $id_menu)->get();
    }

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // public function order()
    // {
    //     return $this->hasMany(Order::class);
    // }
}

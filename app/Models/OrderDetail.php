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

    //Mendapatkan Sub Total dari order detail menjumlahkan total menu yang di pesan serta toping
    public static function getSubTotal($toping, $total_order, $id_menu)
    {
        $sub_total = $total_order * Menu::getHarga($id_menu)->first()->harga_menu;
        if (count($toping) != 0) {
            foreach ($toping as $tp) {
                $sub_total += Toping::getHarga($tp)->first()->harga;
            }
        }
        return $sub_total;
    }
}

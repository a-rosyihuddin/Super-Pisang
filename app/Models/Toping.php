<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toping extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function detailtoping()
    {
        return $this->hasMany(DetailToping::class);
    }

    public static function getHarga($id)
    {
        return Toping::where('id', $id)->get();
    }
}

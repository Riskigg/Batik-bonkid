<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'total',
        'status',
        'phone'
    ];
    public function detail_order()
    {
        return $this->hasMany(Detail_order::class);
    }
}

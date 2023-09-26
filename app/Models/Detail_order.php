<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 
        'order_id', 
        'qty', 
        'price', 
        'subtotal'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

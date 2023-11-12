<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'supplier_id',
        'stock_inventory',
        'supply_time',
        'security_stock',
        'lot_quantity',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}

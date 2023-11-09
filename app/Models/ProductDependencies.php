<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDependencies extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_father',
        'id_product',
        'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    public function father()
    {
        return $this->belongsTo(Product::class, 'id_father', 'id');
    }
}

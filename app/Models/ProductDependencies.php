<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDependencies extends Model
{
    use HasFactory;

    protected $fillable = [
        'father_id',
        'product_id',
        'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    public function father()
    {
        return $this->belongsTo(Product::class, 'id_father', 'id');
    }

    public function getRecursiveDependencies($productId, &$tree = [])
    {
        $details = self::where('father_id', $productId)->get();

        foreach ($details as $detail) {
            $tree[] = $detail;

            // Recursively get details for this product
            $this->getRecursiveDependencies($detail->product_id, $tree);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = 'products';

    public function getSupplier()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id', 'id');
    }

    public function getCategories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

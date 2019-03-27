<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = 'products';

    public function getSupplier()
    {
        $this->belongsTo(Suppliers::class, 'supplier_id', 'id');
    }
}

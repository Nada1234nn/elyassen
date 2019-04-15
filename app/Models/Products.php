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



    public function product_permission()
    {
        return $this->hasMany(products_permissions::class, 'product_id', 'id');
    }
    public function getCategories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getSubCategories()
    {
        return $this->belongsTo(Category::class, 'subcategory_id', 'id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'products_attribute', 'product_id', 'attribute_id')
            ->withPivot('attribute_value', 'attribute_value_en');
    }

    public function image_pro()
    {
        return $this->hasMany(Images::class, 'product_id', 'id');
    }

    public function publications()
    {
        return $this->hasMany(Products_publication::class, 'product_id', 'id');
    }

    public function getShareProduct()
    {
        return $this->hasMany(SharedProduct::class, 'product_id');
    }

    public function getLikes()
    {
        return $this->hasMany(Likes::class, 'product_id');
    }

    public function getProductOrders()
    {
        return $this->hasMany(Products_order::class, 'product_id');
    }

    public function getOrders()
    {
        return $this->hasMany(Orders::class, 'product_id');
    }
}

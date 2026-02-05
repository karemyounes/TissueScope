<?php

namespace App\Models\Admin\Stores;

use App\Models\Admin\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $primarykey = 'Id' ;

    protected $table = 'order_products' ;

    protected $fillable = [
        'Id',
        'OrderId',
        'ProductId',
        'Quantity',
    ];

    public function Order () {

        return $this->belongsTo(Orders::class , 'OrderId');

    }

    public function Product() {

        return $this->belongsTo(Product::class , 'ProductId');

    }
}


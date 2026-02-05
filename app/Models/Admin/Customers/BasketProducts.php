<?php

namespace App\Models\Admin\Customers;

use App\Models\Admin\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasketProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'Id',
        'ProductId',
        'BasketId',
        'Price',
        'Quantity',
    ];

    protected $table ='basket_products';

    protected $primaryKey = 'Id'; 

    public function Product() {

        return $this->belongsTo(Product::class , 'ProductId');

    }

    public function Basket() {

        return $this->belongsTo(Basket::class , 'BasketId');

    }
}

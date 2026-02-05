<?php

namespace App\Models\Admin\Stores;

use App\Models\Admin\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoresProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'Id' ;

    protected $table = 'store_products' ;

    protected $fillable = [
        'Id',
        'StoreId',
        'ProductId',
        'Quantity',
        'BuyingPrice',
    ];

    public function Store () {

        return $this->belongsTo(Stores::class , 'StoreId') ;

    } 

    public function Product () {

        return $this->belongsTo(Product::class , 'ProductId') ;

    }

}

<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = 
    [
        'ProductId' ,
        'CategoryId',
        'ProductName',
        'Description',
        'BuyingPrice',
        'SellingPrice',
        'Barcode',
        'ProductImage'
    ];

    protected $table = 'product';

    protected $primaryKey = 'ProductId' ;

    public function Category () {

        return $this->belongsTo(Category::class,'CategoryId');

    }

    public function BasketProducts() 
    {

        return $this->hasMany(BasketProducts::class, 'ProductId');

    }

    public function favorite() 
    {

        return $this->hasMany(Favorite::class, 'ProductId');

    }

    public function invoiceProducts() 
    {

        return $this->hasMany(InvoiceProducts::class, 'ProductId');

    }
}

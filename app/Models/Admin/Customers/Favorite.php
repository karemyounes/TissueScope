<?php

namespace App\Models\Admin\Customers;

use App\Models\Admin\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'favorite';

    protected $primarykey = 'FavoriteId';

    protected $fillable = 
    [
        'FavoriteId',
        'CustomerId',
        'ProductId',
    ];

    public function customer () {

        return $this->belongsTo(Customer::class, 'CustomerId');

    }

    public function product () {

        return $this->belongsTo(Product::class, 'ProductId');

    }
}

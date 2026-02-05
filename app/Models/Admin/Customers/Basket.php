<?php

namespace App\Models\Admin\Customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'basket';

    protected $fillable = 
    [
        'BasketId',
        'CustomerId',
        'TotalPrice',
        'Status',
        'NumberOfProducts',
        'Date',
        'Time'
    ];

    protected $primarykey = 'BasketId'; 

    public function customer()
    {

        return $this->belongsTo(Customer::class,'CustomerId');
    
    }

    public function BasketProducts() 
    {

        return $this->hasMany(BasketProducts::class, 'BasketId');

    }

}

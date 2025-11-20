<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory ,SoftDeletes ;

    protected $table = 'customer' ;

    protected $fillable = 
    [
        'CustomerId',
        'CustomerName',
        'CustomerPhone',
        'CustomerMail',
        'CustomerImage'
    ] ;

    protected $primarykey = 'CustomerId';

    public function Basket () {

        return $this->hasMany(Basket::class , 'CustomerId');

    }

    public function favorite () {

        return $this->hasMany(favorite::class , 'CustomerId');

    }

    public function invoice () {

        return $this->hasMany(Invoice::class , 'CustomerId');

    }

}

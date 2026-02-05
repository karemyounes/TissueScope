<?php

namespace App\Models\Admin\Stores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory, SoftDeletes;

    protected $primarykey = 'OrderId' ;

    protected $table = 'orders' ;

    protected $fillable = [
        'OrderId',
        'OrderNumber',
        'Quantity',
        'IsOrder',
        'TotalPrice',
        'Status',
        'Date',
        'Time',
    ];
}

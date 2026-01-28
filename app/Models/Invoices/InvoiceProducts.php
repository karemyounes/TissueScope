<?php

namespace App\Models\invoices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceProducts extends Model
{
    use HasFactory ,SoftDeletes;

    protected $table = 'invoice_products';

    protected $primarykey = 'Id';

    protected $fillable = 
    [
        'Id',
        'InvoiceId',
        'ProductId',
        'Price',
        'Quantity',
    ];

    public function invoice () {

        return $this->belongsTo(Invoice::class , 'InvoiceId');

    }

    public function product () {

        return $this->belongsTo(Product::class , 'ProductId');

    }
}

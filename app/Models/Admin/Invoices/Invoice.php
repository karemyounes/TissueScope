<?php

namespace App\Models\Admin\invoices;

use App\Models\Admin\Customers\Customer;
use App\Models\Admin\Stores\Stores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = 
    [
        'InvoiceId',
        'CustomerId',
        'StoreId',
        'Quantity',
        'NumberOfInvoice',
        'TotalPrice',
        'Date',
        'Time',
        'IsCancelled',
    ];

    protected $table = 'invoice';

    protected $primarykey = 'InvoiceId';

    public function customer () {

        return $this->belongsTo(Customer::class, 'CustomerId');

    }

    public function store () {

        return $this->belongsTo(Stores::class, 'StoreId');

    }

    public function invoiceProducts () {

        return $this->hasMany(InvoiceProducts::class, 'InvoiceId');

    }
}

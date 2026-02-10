<?php

namespace App\Models\Admin\Stores;

use App\Models\Admin\invoices\Invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stores extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'store';

    protected $primaryKey = 'StoreId';

    protected $fillable = [
        'StoreId',
        'StorePhone',
        'StoreAddress',
        'StoreName',
        'StoreCode',
        'IsBranch',
    ];

    public function invoice () {

        return $this->hasMany(Invoice::class, 'StoreId');

    }
}

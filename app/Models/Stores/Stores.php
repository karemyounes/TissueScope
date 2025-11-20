<?php

namespace App\Models\Stores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stores extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'store';

    protected $primarykey = 'StoreId';

    protected $fillable = [
        'StoreId',
        'StoreName',
        'IsBranch',
    ];

    public function invoice () {

        return $this->hasMany(Invoice::class, 'StoreId');

    }
}

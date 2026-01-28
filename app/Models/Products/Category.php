<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = 
    [
        'CategoryId',
        'BrandId',
        'CategoryName',
        'CategoryImage'
    ] ;

    protected $table = 'category';

    protected $primaryKey = 'CategoryId';

    public function Brand() {

        return $this->belongsTo(brand::class , 'BrandId');
    
    }

    public function Product() {
        
        return $this->hasMany(SubCategory::class , 'CategoryId');
    
    }
}

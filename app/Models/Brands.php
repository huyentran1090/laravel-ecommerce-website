<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use HasFactory,SoftDeletes;
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'brands';
    public $timestamps = true;

    public function productBrand()
    {
        return $this->hasmany(Product::class,'id_brand','id');
    }
}

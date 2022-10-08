<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'product';
    public $timestamps = true;

    public function categories()
    {
        return $this->belongsTo(Categories::class,'id_cate','id');
    }

    public function brands()
    {
        return $this->belongsTo(Brands::class,'id_brand','id');
    }
    
}

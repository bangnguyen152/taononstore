<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imageModel extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'thumbnail'];
    protected $table = 'images';
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo('App\ProductModel');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Attributeitem extends Model
{
    use HasFactory;
    protected $garded = ['id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

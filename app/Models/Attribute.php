<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Attributegroup;

class Attribute extends Model
{
    use HasFactory;
    protected $garded = ['id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function attributegroups()
    {
        return $this->hasMany(Attributegroup::class);
    }
}

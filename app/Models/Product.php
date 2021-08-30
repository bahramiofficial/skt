<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;
use App\Models\Image;
use App\Models\Categoryshop;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $garded = ['id'];


    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function attributeitems()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function categoryshop()
    {
        return $this->belongsTo(Categoryshop::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

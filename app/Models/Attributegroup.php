<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;
use App\Models\Categoryshop;

class Attributegroup extends Model
{
    use HasFactory;
    protected $garded = ['id'];
    protected $fillable = ['name', 'categoryshop_id'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function categoryshop()
    {
        return $this->belongsTo(Categoryshop::class);
    }
}

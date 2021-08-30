<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoryshop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Categoryshop::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Categoryshop::class, 'parent_id');
    }

    // public function posts()
    // {
    //     return $this->belongsToMany(Post::class);
    // }

    public function getParentName()
    {
        return is_null($this->parent) ? 'ندارد' : $this->parent->name;
    }

}

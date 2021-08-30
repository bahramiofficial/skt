<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Province extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    
    /**
     * Cities of province.
     * @codeCoverageIgnore
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Track;

class City extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'slug',
        'province_id',
    ];

    //protected $with = ['province'];
    
    /**
     * Province of city.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

}

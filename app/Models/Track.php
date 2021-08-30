<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TrackImage;
use App\Models\City;
use App\Models\Province;

class Track extends Model
{
    use HasFactory; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lat',
        'long',
        'desc',
        'confirm',
        'user_id',
        'ctiy_id',
        'province_id',
        'image'
    ]; 




    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }









    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trackimages()
    {
        return $this->hasMany(TrackImage::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'ctiy_id', 'id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }


}

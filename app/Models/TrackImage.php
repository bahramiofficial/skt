<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Track;

class TrackImage extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'title',
        'alt',
        'track_id'
    ]; 

     

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
 
}

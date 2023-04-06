<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends BaseModel
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $appends = ['photo_url', 'video_url', 'features_data'];


    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    function getVideoUrlAttribute()
    {
        return $this->getFirstMediaUrl('video');
    }
    function getPhotoUrlAttribute()
    {
        $urls = [];
        foreach ($this->getMedia('listings') as $media) {
            $urls[] = $media->getUrl();
        }
        return $urls;
//        return $this->getFirstMediaUrl('listings');
    }

    function getFeaturesDataAttribute()
    {
        $features = null;

        if($this->features)
        {
            return json_decode($this->features, true);
        }
        else
        {
            return $features;
        }
    }
}

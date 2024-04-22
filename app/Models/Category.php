<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function paket(){
        return $this->hasMany(Paket::class);
    }
    public function imageWedding(){
        return $this->hasMany(imageWedding::class);
    }
    public function imagePrewedding(){
        return $this->hasMany(ImagePrewedding::class);
    }
    public function imageEngagement(){
        return $this->hasMany(ImageEngagement::class);
    }
    public function imageGraduation(){
        return $this->hasMany(ImageGraduation::class);
    }
    public function video(){
        return $this->hasMany(Video::class);
    }
}

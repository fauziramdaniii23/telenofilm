<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $guarded = [
    //     'id',
    // ];
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function imageWedding(){
        return $this->hasMany(ImageWedding::class);
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
    public function imageEvent(){
        return $this->hasMany(ImageEvent::class);
    }
    public function imageAds(){
        return $this->hasMany(imageAds::class);
    }
    public function video(){
        return $this->hasMany(Video::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function invoice()
    {
        return $this->belongsToMany(Category::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function setPhoneNumberAttribute($value)
    {
        // Mengubah nomor telepon ke format yang diinginkan
        $this->attributes['phone_number'] = $this->normalizePhoneNumber($value);
    }

    private function normalizePhoneNumber($phoneNumber)
    {
        // Menerapkan aturan konversi nomor telepon
        // Misalnya, jika nomor dimulai dengan '0856', ganti menjadi '62856'
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        }

        return $phoneNumber;
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            
        ];
    }
}

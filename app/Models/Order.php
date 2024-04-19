<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\User;

class Order extends Model
{
    use HasFactory, Searchable;
    protected $guarded =['id'];
    protected $primaryKey = 'id';
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
    
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'booking' => $this->booking,
            'created_at' => $this->created_at,
            'status' => $this->status,  
        ];


    }

}

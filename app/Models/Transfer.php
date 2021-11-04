<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    
    protected $fillable = ['description', 'ammount', 'user_id', 'reciever_id'];

    public function User ()
    {
        return $this->belongsTo(User::class);
    }
}

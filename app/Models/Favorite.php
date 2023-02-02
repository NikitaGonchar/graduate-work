<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'vape_id'];
//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function vapes()
//    {
//        return $this->belongsToMany(Vape::class, 'favorite_vapes');
//    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vape()
    {
        return $this->belongsTo(Vape::class);
    }
}
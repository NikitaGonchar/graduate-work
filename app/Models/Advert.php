<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Advert extends Model
{
    use Sortable;

    protected $fillable = [
        'title',
        'description',
        'contacts',
        'price',
        'image',
    ];
    public $sortable = ['price', 'created_at'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'advert_categories');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'advert_brands');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Favorite::class, 'favorite_adverts');
    }
}


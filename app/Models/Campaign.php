<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Campaign extends Model
{
    use HasFactory;

    public function category_campaign()
    {
        return $this->belongsToMany(Category::class, 'category_campaign');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'price'
    ];
    public function picture()
    {
        return $this->hasMany(Picture::class);
    }
}

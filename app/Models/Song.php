<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Song extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::deleting(function (Song $song) {
        });
    }

    public function artist()
    {
       return $this->belongsTo(Artist::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}

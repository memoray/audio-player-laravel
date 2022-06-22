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
            // falls für den datensatz dateien vorhanden sind (songs, bilder etc),
            // dann vorher löschen.
            if(Storage::disk('songs')->exists($song->filename))
            {
                Storage::disk('songs')->delete($song->filename);
            }

            if(Storage::disk('albumImages')->exists($song->image))
            {
                Storage::disk('albumImages')->delete($song->image);
            }
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

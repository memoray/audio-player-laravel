<?php

namespace App\Http\Resources;

use App\Models\Song;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use JsonSerializable;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        /**
         * @var $this Song
         */
        $baseURL = $_SERVER['HTTP_HOST'];
        return [
            'title'         => $this->title,
            'artist'        => $this->artist->name,
            'category'      => $this->category->name,
            'title'         => $this->title,
            'image_url'     => $baseURL . Storage::url('public/albumImages/' . $this->image),
            'song_url'      => $baseURL . Storage::url('public/songs/' . $this->filename),
            'song_length'   => $this->length,
        ];
    }
}

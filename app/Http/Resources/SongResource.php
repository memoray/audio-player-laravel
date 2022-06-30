<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
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
        $protocol = preg_match("/^HTTPS/", $_SERVER['SERVER_PROTOCOL']) ? 'https://' : 'http://';
        $serverAddress = $protocol . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
        return [
            'id'        => $this->id,
            'tile'      => $this->title,
            'category'  => $this->category->name,
            'artist'    => $this->artist->name,
            'length'    => $this->length,
            'image'     => $serverAddress . '/storage/albumimages/' . $this->image,
            'song'      => $serverAddress . '/storage/songs/' . $this->filename,
        ];
    }
}

<?php

namespace App\Http\Requests;

class StoreSongRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         => 'required',
            'filename'      => 'required|mimes:mp3,ma4',
            'length'        => '',
            'image'         =>  'required|image',
            'category_id'   =>'required',
            'artist_id'     =>'required'
        ];
    }
}

<?php

namespace App\Http\Requests;

class UpdateSongRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'filename' => 'nullable|mimes:mp3',
            'length' => '',
            'image' => 'nullable|image',
            'category_id' => 'required',
            'artist_id' => 'required'
        ];
    }
}

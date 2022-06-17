<?php

namespace App\Http\Requests;

class StoreArtistRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:artists,name',
        ];
    }
}

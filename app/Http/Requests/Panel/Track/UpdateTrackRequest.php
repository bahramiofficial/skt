<?php

namespace App\Http\Requests\Panel\Track;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string', 
            'lat' => 'required',
            'long' => 'required',
            'desc' => 'required',  
            'ct' => 'required|numeric|exists:cities,id',
            'province' => 'required|numeric|exists:provinces,id',
        ];
    }
}

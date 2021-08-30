<?php

namespace App\Http\Requests\Panel\Track;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\PseudoTypes\True_;

class CreateTrackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
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
            'image' => 'mimes:jpeg,jpg,png,gif|required',
            'ct' => 'required|numeric|exists:cities,id',
            'province' => 'required|numeric|exists:provinces,id',
        ];
    }
}

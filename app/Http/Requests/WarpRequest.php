<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'RegionID' => ['required', 'string'],
            'PosX' => ['required', 'string'],
            'PosY' => ['required', 'string'],
            'PosZ' => ['required', 'string'],
            'WorldID' => ['required', 'string'],

        ];
    }
}

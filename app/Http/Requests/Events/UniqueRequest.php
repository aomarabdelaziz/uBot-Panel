<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class UniqueRequest extends FormRequest
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

            'Priority' => ['required', 'integer' , 'unique:sqlsrv_user._UniquesSettings,Priority'],
            'UniqueID' => ['required' , 'integer'],
            'UniqueCount' => ['required', 'integer'],
            'UniqueDelay' => ['required', 'integer'],
            'Points' => ['required', 'integer'],

        ];
    }
}

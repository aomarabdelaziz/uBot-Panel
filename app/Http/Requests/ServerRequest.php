<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServerRequest extends FormRequest
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

            'server_host' => ['required', 'string' ],
            'server_port' => ['required', 'integer'],
            'server_accountid' => ['required', 'string'],
            'server_accountpw' => ['required', 'string'],
            'server_charname' => ['string'],
            'server_captcha' => ['nullable'],

        ];
    }
}

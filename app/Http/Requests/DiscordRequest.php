<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscordRequest extends FormRequest
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

            'AutoEvent' => ['required' , 'string' , 'url'],
            'Global' => ['required' , 'string' , 'url'],
            'Uniques' => ['required' , 'string' , 'url'],
            'Service' => ['required' , 'integer'],
            'BotAvatar' => ['required' , 'string' , 'url'],

        ];
    }

    public function messages()
    {
        return [

            'AutoEvent.url' => 'Must be valid url',
            'Global.url' => 'Must be valid url',
            'Uniques.url' => 'Must be valid url',
            'Service.url' => 'Must be valid url',
            'BotAvatar.url' => 'Must be valid url'
        ];
    }


}

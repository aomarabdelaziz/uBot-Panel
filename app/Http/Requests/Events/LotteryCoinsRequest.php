<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class LotteryCoinsRequest extends FormRequest
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
            'MaxRounds' => ['required' , 'integer'],
            'RegKey' => ['required', 'string'],
            'MinPlayers' => ['required', 'integer'],
            'MaxPlayers' => ['required', 'integer'],
            'LotteryAmount' => ['required', 'integer'],
            'PreventPlayerJoinInSameIPOrHwid' => ['required' , 'integer'],
            'Delay1' => ['required', 'integer'],
            'Delay2' => ['required', 'integer'],
        ];
    }
}

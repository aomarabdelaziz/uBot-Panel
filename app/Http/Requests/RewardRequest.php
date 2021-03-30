<?php

namespace App\Http\Requests;

use App\Services\DBConnectionService;
use Illuminate\Foundation\Http\FormRequest;

class RewardRequest extends FormRequest
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


            'RewardType' => ['required', 'string'],
            'RewardControl' => ['required', 'string'],
            'SilkType' => ['required', 'string'],
            'SilkAmount' => ['required', 'integer'],
            'GoldAmount' => ['required', 'integer'],
            'ItemCodeName128' => ['required', 'string'],
            'ItemPlus' => ['required', 'integer'],
            'ItemAmount' => ['required', 'integer'],


        ];
    }
}

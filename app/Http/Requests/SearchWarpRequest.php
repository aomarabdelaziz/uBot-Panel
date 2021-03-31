<?php

namespace App\Http\Requests;

use App\Services\DBConnectionService;
use Illuminate\Foundation\Http\FormRequest;

class SearchWarpRequest extends FormRequest
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

            'event_name' => ['required' , 'string'],
            'WarpKey' => ['required', 'string' , 'unique:sqlsrv_user._SearchWarps,WarpKey'],
            'wRegionID' => ['required', 'integer'],
            'PosX' => ['required', 'string'],
            'PosY' => ['required', 'string'],
            'PosZ' => ['required', 'string'],
            'WorldID' => ['required', 'integer'],
            'HintMessage' => ['required', 'string'],

        ];
    }
}

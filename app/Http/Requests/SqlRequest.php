<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SqlRequest extends FormRequest
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

            'sql_host' => ['required', 'string'],
            'sql_username' => ['required', 'string'],
            'sql_password' => ['required', 'string'],
            'db_account' => ['required', 'string'],
            'db_shard' => ['required', 'string'],
            'db_shardlog' => ['required', 'string'],

        ];
    }
}

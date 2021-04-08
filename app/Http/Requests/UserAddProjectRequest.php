<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddProjectRequest extends FormRequest
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

            'project_name' => ['required', 'string' ,  'alpha_dash', 'unique:user_projects,project_name'],
            'sql_host' => ['required', 'string'],
            'sql_username' => ['required', 'string'],
            'sql_password' => ['required', 'string'],
            'db_account' => ['required', 'string'],
            'db_shard' => ['required', 'string'],
            'db_shardlog' => ['required', 'string'],
            'server_host' => ['required', 'string' ],
            'server_port' => ['required', 'integer'],
            'server_accountid' => ['required', 'string'],
            'server_accountpw' => ['required', 'string'],
            'server_charname' => ['string'],
            'server_captcha' => ['nullable'],
        ];
    }
}

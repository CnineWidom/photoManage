<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
        if(\Request::getPathInfo() == 'home/search') {
            return [
                'search' => '‘required|max:10'
            ];
        }
    }

    public function  messages()
    {
       return $message =[
           'search.required'=>'内容不能为空',
           'search.max'=>'最大10个字符'
       ];
    }


    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->all();
        throw new HttpResponseException(response()->json(['msg' => 'error', 'code' => '500', 'data' => $error[0]], 500));
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
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
    public function rules(Request $request)
    {
        if(Request::getPathInfo() == '/home/search'){
            $rules = [
                'search' => 'required|max:10',
            ];
        }
        // 前台上传图片
        if(Request::getPathInfo() == '/uploadPicture/doupload'){
            $rules = [
                'title' => 'required|max:25|string',
                'keyword' => 'max:30',
                'content' => 'required|between:10,200',
                'author' => 'required',
            ];
        }
        else{
            $rules = [
                'id'=>'max:2'
            ];
        }
        return $rules;
    }

    public function  messages()
    {
       return $message =[
           'search.required'=>'内容不能为空',
           'search.max'=>'最大10个字符',
           'title.required' => '标题不能为空',
           'title.max' => '最多只能输入25字符',
           'title.string' => '标题只能是字符串',
           'keyword.max' =>'关键字最多只能30个',
           'content.between' => '内容在30-200个字符之间',
           'content.required' => '内容不能为空',
           'author.required' => '作者不能空',
       ];
    }


    // protected function failedValidation(Validator $validator)
    // {
    //     $error = $validator->errors()->all();
    //     throw new HttpResponseException(response()->json(['msg' => 'error', 'code' => '500', 'data' => $error[0]], 500));
    // }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'name'=>'required|unique:projects',
            'thumbnail'=>'image|dimensions:min_width=261,min_width=98'
        ];
    }

    //固定的函数名
    //定义表单验证的错误信息
    public function messages(){
        return[
            'name.required'=>'项目名称是必填的',
            'name.unique'=>'项目名称已经被占用',
            'thumbnail.image'=>'请上传图片类型的文件',
            'thumbnail.dimensions'=>'图片的尺寸过小'
        ];
    }
}

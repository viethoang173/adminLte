<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'inputName' => ['required', 'string'],
            'inputDescription' => ['required'],
            'inputStatus' => 'required',
            'inputClientCompany' => ['required'],
            'inputProjectLeader' => ['required', 'string'],
            'inputDescription' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'inputName.required'=>'Vui lòng nhập đầy đủ thông tin!',
            'inputDescription.required'=>'Vui lòng nhập đầy đủ thông tin!',
            'inputStatus.required'=>'Vui lòng nhập đầy đủ thông tin!',
            'inputClientCompany.required'=>'Vui lòng nhập đầy đủ thông tin!',
            'inputProjectLeader.required'=>'Vui lòng nhập đầy đủ thông tin!',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if($this->input('title') == 'Hung'){
                $validator->errors()->add('title', 'Hùng khong được thêm ở đây.');
            }
        });
    }
}

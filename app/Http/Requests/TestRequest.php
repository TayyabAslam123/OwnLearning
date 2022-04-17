<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
        ## DD the incoming request
        // dd($_REQUEST);


        $rules = [
            'username' => 'required|max:2|integer',
            'pass' => 'required'
            // 'username' => 'required|max:255',
            // 'pass' => 'alpha_num'

        ];

        return $rules;
    }

    ## Custom message
    public function messages()
    {
        return [
            'username.required' => 'Username is must',
            'pass.required' => 'Pass is must',  
            // 'required' => 'Field is required',
            'min' => 'The field must be greater than 0.',
            // 'integer' => 'This field should contain numbers only'
        ];
    }

    ## Replace the attribute name when show message
    // public function attributes()
    // {
    //     return [
    //         'username' => 'email-address',
    //     ];
    // }

    // ## Sanitize or update data before validation
    protected function prepareForValidation()
    {
    $this->merge([
        'username' => "hello".($this->username),
    ]);
    }

    
}

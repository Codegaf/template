<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserSave extends FormRequest
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
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'password' => 'nullable|confirmed|min:8',
            'password_confirmation' => 'required_with:password'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if (Request::ajax()) {
            throw new HttpResponseException(
                response()->json([
                    'data_failed' => $validator->messages(),
                    'title' => __('Error'),
                    'message' => __('Compruebe los campos'),
                    'status' => 'error'
                ], 422
                )
            );
        }
        else{
            throw new ValidationException($validator);
        }
    }
}

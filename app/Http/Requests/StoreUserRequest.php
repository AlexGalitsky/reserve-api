<?php

namespace App\Http\Requests;

use HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:6|max:255',
            'email' => 'required|string|min:5|max:255',
            'password' => 'required|string|min:6|max:255',
        ];
    }

    public function failedValidation(Validator $validator)
    {
//        throw new HttpResponseException(
//            response()->json(['success' => false, 'msg' => $validator->errors()->first()], 400)
//        );
        throw new HttpException(400, $validator->errors()->first());
    }
}

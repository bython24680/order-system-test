<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => [
                'required',
                'string',
            ],
            'name' => [
                'required',
                'string',
            ],
            'address' => [
                'required',
                'array',
            ],
            'address.city' => [
                'required_with:address',
                'string',
            ],
            'address.district' => [
                'required_with:address',
                'string',
            ],
            'address.street' => [
                'required_with:address',
                'string',
            ],
            'price' => [
                'required',
                'numeric',
            ],
            'currency' => [
                'required',
                'string',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'Missing required parameter :attribute',
            'required_with' => 'Missing required parameter :attribute',
            'string' => 'Parameter :attribute must be string',
            'array' => 'Parameter :attribute must be array',
            'numeric' => 'Parameter :attribute must be numeric',
        ];
    }

    /**
     * While failed
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Create an order failed. ' . implode(', ', $validator->errors()->all()),
            'data' => [],
        ], 400));
    }
}

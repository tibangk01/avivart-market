<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuickSalePaymentRequest extends FormRequest
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
            'quick_sale_id' => ['required'],
            'order_state_id' => ['required'],
            'payment_mode_id' => ['required'],
            'amount' => ['required'],
            'cheque_number' => ['nullable', 'max:30'],
        ];
    }
}

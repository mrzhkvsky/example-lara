<?php

namespace App\Http\Requests;

use App\Dto\CreateBidAddressDto;
use App\Dto\CreateBidDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateBidRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:6'],
            'description' => ['required', 'string', 'min:6'],
            'address' => [
                'street' => ['required', 'string', 'min:6'],
                'house_number' => ['required', 'string', 'min:1']
            ]
        ];
    }

    public function toDto(): CreateBidDto
    {
        return new CreateBidDto(
            $this->get('title'),
            $this->get('description'),
            new CreateBidAddressDto(
                $this->input('address.street'),
                $this->input('address.house_number')
            )
        );
    }
}

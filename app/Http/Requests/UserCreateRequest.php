<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Requests\CustomValidationErrorMessage;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    use CustomValidationErrorMessage;
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
              'email'       => ['required','email', 'unique:users'],
              'name'        => 'required|string|max:190',
              'password'    => 'required'
        ];
    }
}

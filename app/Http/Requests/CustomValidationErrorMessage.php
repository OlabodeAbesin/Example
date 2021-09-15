<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: olawaleadegboyega
 * Date: 10/09/2019
 * Time: 12:24 PM
 */

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait CustomValidationErrorMessage
{
    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $message = (method_exists($this, 'message'))
            ? $this->container->call([$this, 'message'])
            : 'The given data was invalid.';

        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'message' => $validator->errors()->first(),

        ], 422));
    }

}

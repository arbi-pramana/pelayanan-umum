<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Generated by LaraSpell
 *
 * @author  Ditama Digital <info@ditamadigtal.co.id>
 * @created Wed, 06 Jun 2018 09:10:06 +0000
 */
class UpdateAnggaranSumberDanaRequest extends FormRequest
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
            'id_sumber_dana' => "required|max:255",
            'anggaran' => "required|max:100"
        ];
    }
}

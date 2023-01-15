<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Generated by LaraSpell
 *
 * @author  Ditama Digital <info@ditamadigtal.co.id>
 * @created Thu, 19 Jul 2018 11:01:35 +0000
 */
class CreateBarangRequest extends FormRequest
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
            'nama_barang' => "required|max:255",
            'id_kategori' => "required|max:255"
        ];
    }
}

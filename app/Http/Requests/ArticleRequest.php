<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ArticleRequest extends FormRequest
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
            'title' => 'required|min:5|max:255',
            'tags' => 'required|min:3||max:255',
            'introduction' => 'required|min:50|max:5000',
            'text' => 'nullable|min:50|',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Názov článku nemôže byť prázdny.',
            'title.min' => 'Názov článku musí obsahovať minimálne :min znakov.',
            'title.max' => 'Názov článku môže obshaovať maximálne :max znakov.',

            'tags.required' => 'Tagy článku nemôžu byť prázdne.',
            'tags.min' => 'Tagy článku musia obsahovať minimálne :min znakov.',
            'tags.max' => 'Tagy článku môžu obshaovať maximálne :max znakov.',

            'introduction.required' => 'Úvod článku nemôže byť prázdny.',
            'introduction.min' => 'Úvod článku musí obsahovať minimálne :min znakov.',
            'introduction.max' => 'Úvod článku môže obshaovať maximálne :max znakov.',

            'text.min' => 'Text článku musí obsahovať minimálne :min znakov.',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => rand(1, 99).'-'.Str::slug($this->title),
            'published_at' => !empty($this->published_at) ? $this->published_at : Date("Y-m-d H:i:s"),
        ]);
    }
}

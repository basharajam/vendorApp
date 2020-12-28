<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Models\WP\Term;
use App\Models\WP\TermTaxonomy;

class CheckTagUniqueRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $terms = Term::where('name',$value)->pluck('term_id');
        $term_exists = TermTaxonomy::where('taxonomy','product_tag')->whereIn('term_id',$terms)->get();
        if($term_exists && count($term_exists)>0){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'الاسم موجود مسبقاً الرجاء اختيار اسم آخر';
    }
}

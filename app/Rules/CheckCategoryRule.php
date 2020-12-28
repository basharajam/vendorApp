<?php

namespace App\Rules;

use App\Models\WP\Term;
use App\Models\WP\TermTaxonomy;
use Illuminate\Contracts\Validation\Rule;

class CheckCategoryRule implements Rule
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
        //
        $terms = Term::where('name',$value)->pluck('term_id');
        $term_exists = TermTaxonomy::where('taxonomy','product_cat')->whereIn('term_id',$terms)->get();
        foreach($term_exists as $key=>$taxonomy){
            if($taxonomy->parent==request('parent')){
                return false;
            }
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
        \Session::flash('message',"الاسم موجود مسبقاً الرجاء  اختيار  اسم آخر");
                \Session::flash('status',false);
        return 'الاسم موجود مسبقاً الرجاء اختيار اسم آخر';
    }
}

<?php


namespace App\Services\TermTaxonomy;


use App\Services\Contracts\IBaseService;
use Illuminate\Http\Request;


/**
 * Interface ITermTaxonomyService
 * @package App\Services\TermTaxonomy
 */
interface ITermTaxonomyService extends IBaseService
{
    /** gets categories from termtaxonomy and terms table
     * @return Collection
     */
    public function categories();

    /** stores category info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function storeCategory(Request $request);
}

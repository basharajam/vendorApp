<?php


namespace App\Services\TermTaxonomy;


use App\Services\Contracts\IBaseService;

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
}

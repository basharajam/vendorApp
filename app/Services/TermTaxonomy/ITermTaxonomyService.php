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

     /** gets tags from termtaxonomy and terms table
     * @return Collection
     */
    public function tags();

    /** gets Attributes from termtaxonomy and terms table
     * @param int $supplier_id optional for a supplier else bring them all
     * @return Collection
     */
    public function attributes($supplier_id=null);

     /** stores taxonomy info
     * @param Request $request
     * @param $supplier_id optioanl to save some taxonomy just for that supplier
     * @return TermTaxonomy
     */
    public function store(Request $request , $supplier_id=null);

    /** stores category info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function storeCategory(Request $request);


    /** update attrbiute info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function updateAttribute(Request $request,int $id);



}

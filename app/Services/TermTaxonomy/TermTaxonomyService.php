<?php


namespace App\Services\TermTaxonomy;

use App\Constants\General;
use App\Repositories\TermTaxonomyRepository;
use App\Services\Contracts\BaseService;
use Illuminate\Http\Request;

use App\Models\WP\TermTaxonomy;
use App\Models\WP\Term;
use App\Models\WP\TermRelation;
use App\Models\WP\Post;
use Carbon\Carbon;
use App\Models\WP\AttributeTaxonomy;
/**
 * Class TermTaxonomyService
 * @package App\Services\TermTaxonomy
 */
class TermTaxonomyService extends BaseService implements ITermTaxonomyService
{
    /**
     * TermTaxonomyService constructor.
     * @param TermTaxonomyRepository $repository
     */
    public function __construct(TermTaxonomyRepository $repository)
    {
        parent::__construct($repository);
    }

    /** gets categories  and sub cateogies from termtaxonomy and terms table
     * @param int $supplier_id optional
     * @return Collection
     */
    public function categories_and_sub($supplier_id=null){
        return TermTaxonomy::whereIn('taxonomy',['product_cat'])->when($supplier_id,function($query,$supplier_id){
            return $query->where('supplier_id',$supplier_id);
        })->get();

    }
    /** gets categories from termtaxonomy and terms table
     *
     */
    public function categories(){
        return TermTaxonomy::whereIn('taxonomy',['product_cat'])->where('parent',0)->get();
    }

    /** gets tags from termtaxonomy and terms table
     * @param int $supplier_id optional
     * @return Collection
     */
    public function tags($supplier_id=null){
        return TermTaxonomy::whereIn('taxonomy',['product_tag'])->when($supplier_id,function($query,$supplier_id){
            return $query->where('supplier_id',$supplier_id);
        })->get();
    }

     /** gets Attributes from termtaxonomy and terms table
     * @return Collection
     */
    public function attributes($supplier_id=null){
        return TermTaxonomy::where('taxonomy','like','pa_%')
                            ->groupBy('taxonomy')
                            ->when($supplier_id, function ($query, $supplier_id) {
                                return $query->where('supplier_id', $supplier_id);
                            })->get();
    }

     /** stores category info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function storeCategory(Request $request,$supplier_id=null){
        $term = Term::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'item_group'=>0
        ]);
        $term_taxonomy = TermTaxonomy::create([
            'term_id'=>$term->term_id,
            'taxonomy'=>$request->type,
            'description'=>$request->description,
            'parent'=>$request->parent,
            'supplier_id'=>$supplier_id
        ]);
        //savge image
        if($request->has('image')){
            $file = $request->file('image');
            $now = Carbon::now();
            $year = $now->year;
            $month = $now->month;
            $extension = $request->file('image')->getExtension();
            $post = Post::create([
                'post_author'=>\Auth::user()->wordpress_user->ID,
                'post_date'=>now(),
                'post_date_gmt'=>now(),
                'post_content'=>'',
                'post_title'=>$request->name,
                'post_status'=>'publish',
                'comment_status'=>'closed',
                'ping_status'=>'closed',
                'post_type'=>'attachment',
                'post_mime_type'=>'image/'.$extension,
                'post_excerpt'=>'',
                'to_ping'=>"",
                'pinged'=>'',
                'post_content_filtered'=>'',
                'post_modified'=>now(),
                'post_modified_gmt'=>now()
            ]);
            $post->update([
                'guid'=>General::URL.'/wp-content/uploads/'.$year.'/'.$month.'/'.$post->post_name.'.'.$extension
            ]);
            $term_relation = TermRelation::create([
                'object_id'=>$post->ID,
                'term_taxonomy_id'=>$term_taxonomy->term_taxonomy_id,
                'term_order'=>0
            ]);
            $path = public_path('/wp-content/uploads/'.$year.'/'.$month);

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('file');
            $name = $post->post_name.'.'.$extension;

            $file->move($path, $name);
        }

        return $term_taxonomy;
    }

    /** stores taxonomy info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function store(Request $request , $supplier_id=null){
        $term = Term::create([
            'name'=>$request->name,
            'slug'=>str_replace(' ','-',$request->name),
            'item_group'=>0,


        ]);
        $term_taxonomy = TermTaxonomy::create([
            'term_id'=>$term->term_id,
            'taxonomy'=>$request->taxonomy,
            'description'=>$request->description,
            'parent'=>0,
            "supplier_id"=>$supplier_id
        ]);
        if(isset($request->type) && $request->type=="attributes"){
            AttributeTaxonomy::create([
                'attribute_name'=>$request->name,
                'attribute_label'=>$request->name,
                'attribute_type'=>'select',
                'attribute_public'=>'0',
                'attribute_orderby'=>'menu_order',
                'term_taxonomy_id'=>$term_taxonomy->term_taxonomy_id,
                'supplier_id'=>$supplier_id
            ]);
        }

        return $term_taxonomy;
    }


    public function delete($id){
        $term_taxonomy = TermTaxonomy::where('term_taxonomy_id',$id)->first();
        if($term_taxonomy){
            $term_taxonomy->term->delete();
          return  $term_taxonomy->delete();

        }
        return false;
    }


    public function update(Request $request, $id)
    {
        $term_taxonomy = TermTaxonomy::where('term_taxonomy_id',$id)->first();

        \DB::table(\General::DB_PREFIX.'term_taxonomy')
            ->where('term_taxonomy_id', $id)
            ->update([
                'description'=>$request->description,
                'parent'=>$request->parent ?? 0
            ]);

            if(isset($request->type) && $request->type=="attributes"){
                \Db::table(\General::DB_PREFIX."woocommerce_attribute_taxonomies")
                ->where('term_taxonomy_id',$id)
                ->update([
                    'attribute_name'=>$request->name,
                    'attribute_label'=>$request->name,
                ]);
            }
        $term = $term_taxonomy->term;
      return \DB::table(\General::DB_PREFIX.'terms')
        ->where('term_id', $term->term_id)
        ->update([
            'name'=>$request->name,
            'slug'=>$request->slug
        ]);

    }

     /** update attrbiute info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function updateAttribute(Request $request,$id){
        $term_taxonomy = TermTaxonomy::where('term_taxonomy_id',$id)->first();
        \DB::table(\General::DB_PREFIX.'term_taxonomy')
            ->where('term_taxonomy_id', $id)
            ->update([
                'taxonomy'=>$request->taxonomy,

            ]);

        $term = $term_taxonomy->term;
       return  \DB::table(\General::DB_PREFIX.'terms')
        ->where('term_id', $term->id)
        ->update([
            'name'=>$request->name,
            'slug'=>$request->slug
        ]);

    }

}

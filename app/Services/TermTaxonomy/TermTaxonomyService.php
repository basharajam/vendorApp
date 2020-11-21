<?php


namespace App\Services\TermTaxonomy;

use App\Constants\General;
use App\Repositories\TermTaxonomyRepository;
use App\Services\Contracts\BaseService;
use Illuminate\Http\Request;

use App\Models\WP\TermTaxonomy;
use App\Models\Wp\Term;
use App\Models\WP\TermRelation;
use App\Models\WP\Post;
use Carbon\Carbon;
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

    /** gets categories from termtaxonomy and terms table
     *
     */
    public function categories(){
        return TermTaxonomy::whereIn('taxonomy',['product_cat'])->get();
    }

    /** gets tags from termtaxonomy and terms table
     * @return Collection
     */
    public function tags(){
        return TermTaxonomy::whereIn('taxonomy',['product_tag'])->get();
    }

     /** gets Attributes from termtaxonomy and terms table
     * @return Collection
     */
    public function attributes(){
        return TermTaxonomy::where('taxonomy','like','pa_%')->groupBy('taxonomy')->get();
    }

     /** stores category info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function storeCategory(Request $request){
        $term = Term::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'item_group'=>0
        ]);
        $term_taxonomy = TermTaxonomy::create([
            'term_id'=>$term->term_id,
            'taxonomy'=>$request->type,
            'description'=>$request->description,
            'parent'=>$request->parent
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
    public function store(Request $request){
        $term = Term::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'item_group'=>0
        ]);
        $term_taxonomy = TermTaxonomy::create([
            'term_id'=>$term->term_id,
            'taxonomy'=>$request->taxonomy,
            'description'=>$request->description,
            'parent'=>0
        ]);


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
        \DB::table('wpug_term_taxonomy')
            ->where('term_taxonomy_id', $id)
            ->update([
                'description'=>$request->description,
                'parent'=>$request->parent ?? 0
            ]);

        $term = $term_taxonomy->term;
       return  \DB::table('wpug_terms')
        ->where('term_id', $term->id)
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
        \DB::table('wpug_term_taxonomy')
            ->where('term_taxonomy_id', $id)
            ->update([
                'taxonomy'=>$request->taxonomy,
            ]);

        $term = $term_taxonomy->term;
       return  \DB::table('wpug_terms')
        ->where('term_id', $term->id)
        ->update([
            'name'=>$request->name,
            'slug'=>$request->slug
        ]);

    }

}
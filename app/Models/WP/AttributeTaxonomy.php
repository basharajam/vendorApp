<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;
use App\Models\WP\TermRelation;
class AttributeTaxonomy extends Model
{
    protected $table=\General::DB_PREFIX."woocommerce_attribute_taxonomies";
    protected $primaryKey="attribute_id";

    protected $fillable=[
        'attribute_id',
        'attribute_name',
        'attribute_label',
        'attribute_type',
        'attribute_public',
        'attribute_orderby',
        'supplier_id',
        'term_taxonomy_id',
    ];
    public $timestamps = false;

}

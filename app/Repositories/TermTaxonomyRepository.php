<?php

namespace  App\Repositories;

use App\Repositories\Contracts\BaseRepository;
use App\Models\WP\TermTaxonomy;

class TermTaxonomyRepository extends BaseRepository
{
     public function __construct(TermTaxonomy $termtaxonomy)
    {
        parent::__construct($termtaxonomy);
    }
}






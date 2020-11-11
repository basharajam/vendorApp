<?php

namespace App\Http\Controllers\WP;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WP\TermTaxonomy;
use App\Models\WP\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function getCategories(){
         $categories = TermTaxonomy::categories()->get();
         dd($categories);
        // $products = Post::products()->get();
        $user = User::query()->orderBy('id','desc')->first();
        dd($user->wordpress_user);
       return  $categories;
    }
}

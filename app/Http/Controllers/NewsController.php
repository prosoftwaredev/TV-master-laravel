<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostCategory;

class NewsController extends Controller
{

    public function index(){

        $features = Post::where('category_id', array(1) )->orderBy('created_at', 'DESC')->get();
        $lits = Post::where('category_id', array(2) )->orderBy('created_at', 'DESC')->get();
        $pictures = Post::where('category_id', array(3) )->orderBy('created_at', 'DESC')->get();

        return view('news', compact('features', 'lits', 'pictures') );
    }


    public function getSinglePost($slug){

        //fetch from the db based on slug
        $article = Post::where('slug', '=', $slug)->first();

        //return view
        return view('singlenews', compact('article'));
    }



}

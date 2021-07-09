<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = [1,2,3,4,5];
        return view('blog.index', [
            'posts' => $posts
        ]);
    }

    public function show($post){
        return view('blog.show');
    }
}


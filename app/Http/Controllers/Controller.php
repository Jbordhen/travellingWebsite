<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tour;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){
        $data=Post::orderBy('updated_at','desc')->get();
        return view('home')->with('posts',$data);
    }

    public function tours(){
        $data=Tour::orderBy('created_at','desc')->get();
        return view('tours')->with('tours',$data);
    }

    public function about(){
        return view('about');
    }

    public function places(){
        return view('places');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tour;
use App\Comment;
use Illuminate\Http\Request;


class TravelController extends Controller
{
    public function create(Request $request){

        $this->validate(request(),[
           'title'=>'required',
            'textarea'=>'required'
        ]);

        $post['postTitle']=$request->title;
        $post['postDescription']=$request->textarea;
        $post['userId']=Auth::id();

        //dd($post);
        $post=Post::create($post);
        $post->save();
        $data=Post::orderBy('updated_at','desc')->get();
        return redirect('home')->with('posts',$data);
    }

    public function update(Request $request){
        //dd($request);
        $this->validate(request(),[
            'title'=>'required',
            'textarea'=>'required'
        ]);

        $data=DB::table('posts')->where('id',$request->postId)->update(['postTitle'=>$request->title,'postDescription'=>$request->textarea]);
        //dd($data);
        $data=Post::orderBy('updated_at','desc')->get();
        return redirect('home')->with('posts',$data);
    }

    public function destroy(Request $request)
    {
        $id=$request->get('post');
        $post=Post::find($id);
        $post->delete();
        $data=Post::orderBy('updated_at','desc')->get();
        return redirect('home')->with('posts',$data);
    }

    public function comment(Request $request){

        $this->validate(request(),[
            'comment'=>'required'
        ]);
        $comment['postId']=$request->postId;
        $comment['userId']=$request->userId;
        $comment['commentBody']=$request->comment;
        //dd($comment);
        $comment=Comment::create($comment);
        //$comment=DB::table('comments')->updateOrInsert(['postId'=>$request->userId,'userId'])
        $comment->save();
        $data=Post::orderBy('updated_at','desc')->get();
        return redirect('home')->with('posts',$data);
    }

    public function search(Request $request){
        $text=$request->search;
        $order=$request->Order_by;
        //dd($request);
        if($text==null){
            $post=DB::table('posts')->orderBy('updated_at',"$order")->get();
           //dd($post);
            return view('home')->with('posts',$post);
        }
        else{
            $post=DB::table('posts')->where("postTitle",'like',"%$text%")->orderBy('updated_at',"$order")->get();
            //dd($post);
            if(count($post)==0){
                return view('home')->with('posts',null)->with('status','No search result found');
            }
            return view('home')->with('posts',$post);
        }
        //dd($post);
    }

    public function tour(Request $request){
        $text=$request->search;
        $order=$request->Order_by;
        //dd($request);
        if($text==null){
            $tour=DB::table('tours')->orderBy('created_at',"$order")->get();
            //dd($post);
            return view('tours')->with('tours',$tour);
        }
        else{
            $tour=DB::table('tours')->where("location",'like',"%$text%")->orderBy('created_at',"$order")->get();
            //dd($post);
            if(count($tour)==0){
                return view('tours')->with('tours',null)->with('status','No search result found');
            }
            return view('tours')->with('tours',$tour);
        }
    }

    public function createtour(Request $request){

        $this->validate(request(),[
            'title'=>'required',
            'location'=>'required',
            'textarea'=>'required'
        ]);
        //@dd($request);
        $tour['name']=$request->title;
        $tour['location']=$request->location;
        $tour['tourDescription']=$request->textarea;
        $tour['creator']=Auth::id();

        //dd($tour);
        $tour=Tour::create($tour);
        $tour->save();

        $data=Tour::orderBy('created_at','desc')->get();
        return redirect('tours')->with('tours',$data);
    }
}

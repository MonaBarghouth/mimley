<?php

namespace App\Http\Controllers;

use App\Post;
use App\Post_media;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function posts(){

        $posts=Post::all();
        $arr=array('posts'=>$posts);
        return view('posts.posts',$arr);
    }

    public function store(Request $request){
        DB::transaction(function() use ($request) {
            $post = new Post();
            $post->body = $request->body;
            $post->user_id = auth()->user()->id;
            $post->save();
            if (count($request->image)>0)
                foreach ($request->image as $image){
                $img = new Post_media();
                $img->path = 'post/images/' . $image;
                $img->post_id = $post->id;
                $img->save();
            }
//
//            $filenameWithExtention = $request->file('path')->getClientOriginalName();
//            $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
//            $extention = $request->file('path')->getClientOriginalExtension();
//            $fileStore = $fileName . '_' . time() . '.' . $extention;
//            $path = $request->file('path')->move(base_path() . '/public/upload/posts', $fileStore);
//            $img->path = 'upload/posts/' . $fileStore;
//            $img->post_id = $post->id;
//
//            $img->save();

        });

        return redirect()->back();
    }
    public function image1(Request $request){

        $file=$request->file('file');
        $fileName=uniqid() .$file->getClientOriginalName();
        $file->move('post/images',$fileName);
        $post=Post::find(1);
        /*$image=$post->images()->create([
            'post_id'=>1,
            'file_name'=>$fileName,
            'file_size'=>$file->getClientSize(),
            'file_mime'=>$file->getClientMimeType(),
            'file_path'=>'post/images/'.$fileName,
        ]);*/
        return response()->json( $fileName,200);

        //  return view('image');
    }
}

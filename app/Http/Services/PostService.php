<?php

namespace App\Http\Services;
use App\Models\Post;
use App\Http\Requests\Posts\PostsRequest;

class PostService{
    
    public function list(){
    $data = Post::get();
    return response()->json(['msg'=>"succecss",'data'=>$data]);
    }

    public function create(PostsRequest $request){
        $data = Post::create([
           "user_id"=>$request->user_id,
           "title"=>$request->title,
           "content"=>$request->content
          ]);
        return response()->json(['msg'=>"succecss"]);
   }

   public function update(PostsRequest $request ,$id){
        $data=Post::find($id);
        if(!$data){
            return response()->json(['msg'=>"The data Not Found"]);
        }
        $data->update([
          "user_id"=>$request->user_id,
          "title"=>$request->title,
          "content"=>$request->content
          ]);
        return response()->json(['msg'=>"succecss",'data'=>$data]);
}

  public function delete($id){
    $data=Post::find($id);
    if(!$data){
        return response()->json(['msg'=>"The data Not Found"]);
    }
    $data->delete();
    return response()->json(['msg'=>"delete succecss"]);
}
}
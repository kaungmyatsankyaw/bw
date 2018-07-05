<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Log;

class CommentController extends ApiController
{
    public function comment(Request $request)
    {
        $data=$request->getContent();
        $data=json_decode($data,true);
        $user_id = $data['user_id'];
        $post_id = $data['post_id'];
        $comment = $data['comment'];

        $result = Comment::create([
            'client_user_id' => $user_id,
            'post_id' => $post_id,
            'description' => $comment
        ]);

        Log::create([
          'client_user_id'=>$user_id,
          'action'=>'Comment Post'
        ]);

        if ($request) {
            return response()->json(['status' => 1, 'message' => 'Success']);
        } else {
            return response()->json(['status' => 1, 'message' => 'Unsuccess']);

        }
    }

    public function post_comment(Request $request)
    {
        $data=$request->getContent();
        $data=json_decode($data,true);
        $post_id=$data['post_id'];
        $comments = Comment::where('post_id', $post_id)->get();
        $result = array();

        $result['post_id'] = $post_id;
        foreach ($comments as $comment) {
            $out['comment'] = $comment->description;
            $result[] = $out;
            unset($out);
        }
        return response()->json(['data' => collect($result), 'status' => 1]);
    }

    public function comment_delete(Request $request){

        $data=$request->getContent();
        $data=json_decode($data,true);
        $id=$data['id'];

        $result=Comment::destroy($id);

        $user_id=$_SESSION['client_id'];

        Log::create([
          'client_user_id'=>$user_id,
          'action'=>'Delete Comment'
        ]);

        if($result){
            return response()->json(['status'=>1,'message'=>'Success']);

        }

    }

}

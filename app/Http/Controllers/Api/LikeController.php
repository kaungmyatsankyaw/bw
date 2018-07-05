<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;

class LikeController extends ApiController
{

    public function like(Request $request)
    {
        $data=$request->getContent();
        $data=json_decode($data,true);
        $user_id = $data['user_id'];
        $post_id = $data['post_id'];

        $checkLike = $this->checkLike($user_id, $post_id);

        if ($checkLike) {
            return response()->json(['message'=>'already like','status'=>0], 200);

        } else {
            $like = new Like();
            $like->client_user_id = $user_id;
            $like->post_id = $post_id;
            $like->save();

            Log::create([
              'client_user_id'=>$user_id,
              'action'=>'Like Post'
            ]);

            $result = array(
                'user_id' => $user_id,
                'post_id' => $post_id
            );
            return response()->json(['data' => $result, 'status' => 1], 200);

        }

    }

    public function unlike(Request $request){

        $data=$request->getContent();
        $data=json_decode($data,true);
        $user_id=$data['user_id'];
        $post_id=$data['post_id'];

        Log::create([
          'client_user_id'=>$user_id,
          'action'=>'Unlike Post',
        ]);

        $result=DB::statement("delete from likes where post_id=$post_id and client_user_id=$user_id");

        if($result){
            return response()->json(['status'=>1,'message'=>'Success']);
        }

    }

    public function checkLike($user_id, $post_id)
    {
        $likes = Like::where('client_user_id', $user_id)->get();
        $like_array=array();
        foreach ($likes as $like) {
           array_push($like_array,$like->post_id);
        }
        if(in_array($post_id,$like_array)){
            return true;
        }else{
            return false;
        }
    }

}

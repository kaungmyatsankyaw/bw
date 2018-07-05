<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client_user;
use App\Donation;

class DonationController extends Controller
{
    public function index(){

      $users=Client_user::where('member',1)->get();
      return view('admin/member/index',compact('users',$users));
    }


    public function detail($id){
      return view('admin/member/detail',compact('id',$id));
    }

    public function donation($id){
      $donation=Donation::where('client_user_id',$id)->get();
    //   return $donation;
      return response()->json(['donation'=>$donation]);
    }
    
    public function store(Request $request){
        $data=$request->getContent();
        // dd($data);
        $data=json_decode($data,true);
        // echo '<pre>';
        $data=json_decode($data['body'],true);
        $date=$data['date'];
        $number=$data['number'];
        $id=$data['id'];
        Donation::create([
                'client_user_id'=>$id,
                'money'=>$number,
                'date'=>$date
            ]);
    }
    
    public function delete($id){
        Donation::destroy($id);
    }
    
    public function edit($id){
        $donation=Donation::find($id);
       return response()->json(['donation'=>$donation]);
    }
    
    public function update(Request $request,$id){
        $donation=Donation::find($id);
        $data=$request->getContent();
        $data=json_decode($data,true);
         $data=json_decode($data['body'],true);
        $date=$data['date'];
        $money=$data['money'];
        $donation->money=$money;
        $donation->date=$date;
        $donation->save();
    }

}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Fullmon;

class FullmonController extends Controller
{
  public function __construct()
  {
      date_default_timezone_set("Asia/Yangon");
  }


  public function index(){
    $today=date('Y-m-d');
    $tomorrow = date("Y-m-d", time() + 86400);
    $result=array();

    // $today_noti=Fullmon::where('date',$today)->where('active',1)->get();

    $today_noti=DB::select("select name,message,date from fullmons where date='$today' and active=1" );
    $tomorrow_noti=DB::select("select name,message,date from fullmons where date='$tomorrow' and active=1");

    if($today_noti and $tomorrow_noti){

      $result['today_noti_name']=$today_noti[0]->name;
      $result['today_noti_message']=$today_noti[0]->message;
      $result['today_date']=$today_noti[0]->date;
      $result['today_noti_status']=1;

      $result['tomorrow_noti_name']=$tomorrow_noti[0]->name;
      $result['tomorrow_noti_message']=$tomorrow_noti[0]->message;
      $result['tomorrow_noti_date']=$tomorrow_noti[0]->date;
      $result['tomorrow_noti_stauts']=1;


    }elseif($today_noti and !$tomorrow_noti){

      $result['today_noti_name']=$today_noti[0]->name;
      $result['today_noti_message']=$today_noti[0]->message;
      $result['today_date']=$today_noti[0]->date;
      $result['today_noti_status']=1;

      $result['tomorrow_noti_name']='';
      $result['tomorrow_noti_message']='';
      $result['tomorrow_noti_date']='';
      $result['tomorrow_noti_stauts']=0;

    }else if(!$today_noti && $tomorrow_noti){
      $result['today_noti_name']='';
      $result['today_noti_message']='';
      $result['today_date']='';
      $result['today_noti_status']=0;

      $result['tomorrow_noti_name']=$tomorrow_noti[0]->name;
      $result['tomorrow_noti_message']=$tomorrow_noti[0]->message;
      $result['tomorrow_noti_date']=$tomorrow_noti[0]->date;
      $result['tomorrow_noti_stauts']=1;
    }
    else if (!$today_noti and !$tomorrow_noti) {

      $result['today_noti_name']='';
      $result['today_noti_message']='';
      $result['today_date']='';
      $result['today_noti_status']=0;

      $result['tomorrow_noti_name']='';
      $result['tomorrow_noti_message']='';
      $result['tomorrow_noti_date']='';
      $result['tomorrow_noti_stauts']=0;
    }



    return response()->json(['data'=>$result]);


  }

}

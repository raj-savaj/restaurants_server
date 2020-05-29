<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
class RestController extends Controller
{
    public function login(Request $request)
    {
        
   	  $data=[];
      $post=$request->all();
      if(isset($post["Ltype"]) && isset($post["Password"]))
      {
      	  $type=$post["Ltype"];
	      $pass=$post["Password"];
	      $users = DB::table('Su_user')
	                    ->where('sunametype', '=', $type)
	                    ->Where('su_pass','=',$pass)
	                    ->get();
	      if(isset($users[0]->sunametype))
	      {
	      	if(($users[0]->sunametype)=="wadmin")
  		    {
  		      	 $data=["status"=>"1"];
  		    }
	      }
	      else
	      {
	      	 $data=["status"=>"0"];
	      }
      }
      else
      {
      	 $data=["status"=>"2"];
      }
      return response()->json($data);
    }


    public function getseat()
    {
    	$table=DB::table("seattable")->get();
    	return  response()->json($table);
    }
    
   /* public function getParsel()
    {
    	$parsel=DB::table("parsel_table")->get();
    	return  response()->json($parsel);
    }
    */
    public function checkseat(Request $request)
    { 
        $data=[];
        $post=$request->all();
        if(isset($post["tbid"]))
        {
           $tbid=$post["tbid"];
           $sdata = DB::table('seattable')
                        ->where('stid', '=', $tbid)
                        ->get(['status']);
          if(($sdata[0]->status)=="1")
          {
            $data=["status"=>"1"];
          }
          else
          {
            $data=["status"=>"0"];
          }
        }
        return response()->json($data);
    }

    public function getProduct(Request $request)
    {
      /*$table=DB::table("food dish")->select('*')
            ->whereNOTIn('fd_id',function($query){
              $tid=Input::get('tableid');
               $query->select('It_id')->from('norder')->where("Tb_no","=",$tid)->where("Status","=",1);
            })->get();*/
        $table=DB::table("food dish")->get();    
        return  response()->json($table);
    }

    public function demo()
    {
        $table=DB::table("food dish")->get();
       
        return  response()->json($table);
    }
    public function saveOrder(Request $request)
    {
      $data=[];
      $quantities = Input::get('qty');
      $pids = Input::get('pid');
      $tableid=Input::get('tableid');
      $num=Input::get('numper');
      foreach($quantities as $key => $n) 
      {
        $data=array('Tb_no'=>$tableid,'It_id' =>$pids[$key] ,'Qty' =>$quantities[$key],'Status'=>1, );  
        $sql=DB::table('norder')->insert($data);
      }
      $sql=DB::table('seattable')->where('stid',$tableid)->update(['tbseat'=>$num]);
      return response()->json($data);
    }


    public function tableLock(Request $request)
    {
       $tableid=Input::get('tableid');
       $sql=DB::table('seattable')->where('stid',$tableid)->update(['status'=>1,'time'=>NOW()]);
       return response()->json($sql);
    }

    public function TableProduct(Request $request)
    {
       $tableid=Input::get('tableid');
       $users = DB::table('norder')
            ->whereRaw("norder.Qty > 0")
            ->join('food dish', 'norder.It_id', '=','food dish.fd_id')
            ->select('norder.Id','food dish.fd_id', 'food dish.fd_name', 'food dish.fds_name','food dish.fd_Price', 'food dish.fd_image','norder.Qty')
            ->where("norder.Tb_no","=",$tableid)
            ->where("norder.Status","=",1)
            ->get();
       return response()->json($users);
    }
    public function updateOrder(Request $request)
    {
      $data=[];
      $quantities = Input::get('qty');
      $pids = Input::get('pid');
      $oids = Input::get('oid');
      $tableid=Input::get('tableid');
      foreach($quantities as $key => $n) 
      {
        if($oids[$key]!="0")
        {
          $update=DB::table('norder')->where('Id',$oids[$key])->update(['Qty'=>$quantities[$key]]);
        }
        else
        {
          $data=array('Tb_no'=>$tableid,'It_id' =>$pids[$key] ,'Qty' =>$quantities[$key],'Status'=>1, ); 
          $sql=DB::table('norder')->insert($data);
        }
      }
      return response()->json($data);
    }

    public function finishOrder(Request $request)
    {
      $pids = Input::get('oid');
      $tableid=Input::get('tableid');
      $sql=DB::table('seattable')->where('stid',$tableid)->update(['status'=>0]);
      foreach($pids as $key => $n) 
      {
        $oid=Input::get('uoid');
        $update=DB::table('norder')->where('Tb_no',$tableid)->where("Id",$pids[$key])->update(['Status'=>2,'oid'=>$oid]);
      }
      $data=["status"=>"0"];
      return response()->json($data);
    }

    public function RunningTable(Request $request)
    {
       $tableid=Input::get('tableid');
       $users = DB::table('norder')
            ->whereRaw("norder.Qty > norder.Serve")
            ->where("norder.Tb_no","=",$tableid)
            ->where("norder.Status","=",1)
            ->join('food dish', 'norder.It_id', '=','food dish.fd_id')
            ->select('norder.Id', 'food dish.fd_name','food dish.fd_Price', 'food dish.fd_image','norder.Qty','norder.Serve as serve')
            ->get();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     return response()->json($users);
    }

    public function cancelItem(Request $request)
    {
      $oid=Input::get('oid');
      $serve=Input::get('serve');
      $update=DB::table('norder')->where('Id',$oid)->update(['Qty'=>$serve]);
      $sql=DB::table('norder')
          ->where('Id',$oid)
          ->where('Qty',0)
          ->where('Serve',0)->get();
      if(isset($sql[0]->Id))
      {
          DB::table('norder')->where('Id','=',$oid)->delete();
      }
      return response()->json(["status"=>"1"]);
    }

    public function changeItem(Request $request)
    {
      $oids = Input::get('oid');
      $qtys=Input::get('qty');
      foreach($oids as $key => $n) 
      {
          $update=DB::table('norder')->where('Id',$oids[$key])->update(['Qty'=>DB::raw("Serve + ".$qtys[$key].  "")]);
          $sql=DB::table('norder')
            ->where('Id',$oids[$key])
            ->where('Qty',0)
            ->where('Serve',0)->get();
          if(isset($sql[0]->Id))
          {
              DB::table('norder')->where('Id','=',$oids[$key])->delete();
          }
      }
      $data=["status"=>"0"];
      return response()->json($data);
    }
    
    public function addContect(Request $request)
    {
      $mno = Input::get('mno');
      $name=Input::get('name');
      foreach($mno as $key => $n) 
      {
          $phone=str_replace("+91","",$mno[$key]);
          $phone=str_replace(" ","",$phone);
          //$data=array('name'=>$name[$key],'mno' =>$phone, ); 
          //$sql=DB::table('contect')->insert($data);
           DB::select('call acontect(?,?)', array($name[$key],$phone));
      }
      $data=["status"=>"0"];
      return response()->json($data);
    }
    //Shetal
    public function category()
    {
        $table=DB::table("category")->get();
        return  response()->json($table);
    }
    public function freeTable(Request $r)
    {
        $post=$r->all();
        $id=$post['tbid'];
        $sql=DB::table('seattable')->where('stid',$id)->update(['status'=>0]);
        DB::table('norder')->where('Tb_no', $id)->where('Status', '1')->delete();
        return  response()->json($sql);
    }
    
}

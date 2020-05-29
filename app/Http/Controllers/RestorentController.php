<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests;
use \Input as Input;
use Auth;
use Illuminate\Support\Facades\Artisan;
use App\User;
use DB;

class RestorentController extends Controller
{
  public function Dashbord()
  {
   	 return view('home');
  }
  public function backup()
  {
      Artisan::call('backup:mysql-dump');
      dd(Artisan::output());
  }
public function kichen()
{
    
  \Artisan::call('view:clear');
     
  \Artisan::call('cache:clear');
  $order=DB::select(DB::raw("SELECT s.stid as Tb_no,s.tbname,s.tbseat as per FROM seattable s WHERE s.status=1 ORDER BY s.time DESC"));
  return view('Kichansceen')->with('order',$order);
}

public function kichendata()
{
  $order=DB::select(DB::raw("SELECT s.stid as Tb_no,s.tbname,s.tbseat as per FROM seattable s WHERE s.status=1 ORDER BY s.time DESC"));
  return view('kitchendata')->with('order',$order);
}

 public function order()
 {
   return view('Menuorder');

 }
public function Categorys()
{
	$result= DB::table('category')->paginate(10);
	return view('category')->with('data',$result);
}
public function subCategorys()
{
  $result1= DB::table('sub_cat')->paginate(10);
   $category1 = DB::table('category')->select('Cid', 'C_name')->get();
   return view('subcategory')->withData($result1)
                             ->withRecored($category1);
}
   public function tbseat()
{
    return view('tableseat');
}
public function edit($Cid)
{
	$row=DB::table('category')->where('Cid',$Cid)->first();
	return view('EditCategory')->with('row',$row );
}
public function Cdelete($Cid)
{
   $d=DB::table('category')->where('Cid',$Cid)->delete();
   if($d > 0)
      {

      	\Session::flash('message','successfully Deleted');
      	return redirect('Category');
      } 	
}
public function scedit($scid)
{
   $row=DB::table('sub_cate')->where('scid',$scid)->first();
   return view('EditsubCategory')->with('row',$row );
}
public function SCdelete($scid)
{
   $d=DB::table('sub_cate')->where('scid',$scid)->delete();
   if($d > 0)
      {

         \Session::flash('message','successfully Deleted');
         return redirect('subcategory');
      }  
}
public function save(Request $request)
{
   $post =$request->all();

   $v    =\Validator::make($request->all(),
      	[
   		'C_name' => 'required',]);

   if($v->fails())
   {
   	 return redirect()->back()->withError($v->errors());
   }
   else
   {
      $data=array(
      	'C_name' => $post['C_name'], );  

      $sql=DB::table('category')->insert($data);
      
      if($sql > 0)
      {

      	\Session::flash('message','successfully insert');
      	return redirect('Category');
      } 	
   }
}
public function Update(Request $request)
{
   $post =$request->all();

   $v    =\Validator::make($request->all(),
         [
         'C_name' => 'required',]);

   if($v->fails())
   {
       return redirect()->back()->withError($v->errors());
   }
   else
   {
      $data=array(
         'C_name' => $post['C_name'], );  

      $sql=DB::table('category')->where('Cid',$post['Cid'])->update($data);
      
      if($sql > 0)
      {

         \Session::flash('message','successfully updates');
         return redirect('Category');
      }  
   }
}
public function subsave(Request $request)
{
   $post =$request->all();

   $v    =\Validator::make($request->all(),
         [
         'sub_name' => 'required',]);

   if($v->fails())
   {
       return redirect()->back()->withError($v->errors());
   }
   else
   {
      $data=array(
         'sub_name' => $post['sub_name'],
         'Cid' =>$post['cname'], 
      );  

      $sql=DB::table('sub_cate')->insert($data);
      
      if($sql > 0)
      {

         \Session::flash('message','successfully insert');
         return redirect('subcategory');
      }  
   }
}
public function viecategory()
{
  $category1 = DB::table('category')->select('Cid', 'C_name')->get();
return View('subcategory')->with('recored',$category1);
}
public function savetable(Request $request)
{
   $post =$request->all();

   $v    =\Validator::make($request->all(),
         [
         'tbname' => 'required',
         'tbseat' => 'required',
      ]);

   if($v->fails())
   {
       return redirect()->back()->withError($v->errors());
   }
   else
   {
      $data1=array(
         'tbname' => $post['tbname'],
         'tbseat' => $post['tbseat'], 
          );  

      $sql=DB::table('seattable')->insert($data1);
      
      if($sql > 0)
      {

         \Session::flash('message','successfully insert');
         return redirect('tableseat');
      }  
   }
}
public function subUpdate(Request $request)
{
   $post =$request->all();

   $v    =\Validator::make($request->all(),
         [
         'sub_name' => 'required',
         'Cid' => 'required',]);

   if($v->fails()) 
   {
       return redirect()->back()->withError($v->errors());
   }
   else
   {
      $data=array(
         'sub_name' => $post['sub_name'],
         'Cid' => $post['Cid'],
          );  

      $sql=DB::table('sub_cate')->where('scid',$post['scid'])->update($data);
      
      if($sql > 0)
      {

         \Session::flash('message','successfully updates');
         return redirect('subcategory');
      }  
   }
}
public function seattable()
{
   $result= DB::table('seattable')->paginate(12);
   return view('tableseat')->with('data1',$result);
}
public function Sdelete($stid)
{
   $d=DB::table('seattable')->where('stid',$stid)->delete();
   if($d > 0)
      {

         \Session::flash('message','successfully Deleted');
         return redirect('tableseat');
      }  
}
public function stedit($stid)
{
   $row=DB::table('seattable')->where('stid',$stid)->first();
   return view('edittable')->with('row',$row );
}
public function StUpdate(Request $request)
{
    $post =$request->all();

   $v    =\Validator::make($request->all(),
         [
         'tbname' => 'required',
         'tbseat' => 'required',
      ]);

   if($v->fails())
   {
       return redirect()->back()->withError($v->errors());
   }
   else
   {
      $data1=array(
         'tbname' => $post['tbname'],
         'tbseat' => $post['tbseat'], 
          );  

      $sql=DB::table('seattable')->where('stid',$post['stid'])->update($data1);
      
      if($sql > 0)
      {

         \Session::flash('message','successfully update');
         return redirect('tableseat');
      }  
   }

}
public function coldrik()
{
   
   $result= DB::table('rcoldricks')->paginate(10);
   return view('Coldriks')->with('cddata',$result);
}
public function coldsave(Request $request)
{
   $post =$request->all();

   $v    =\Validator::make($request->all(),
         [
         'Cd_name'  => 'required',
         'Cd_price' => 'required',
         'Cd_code'   => 'required',
      ]);

   if($v->fails())
   {
       return redirect()->back()->withError($v->errors());
   }
   else
   {
      $data=array(
         'Cd_name' => $post['Cd_name'], 
         'Cd_price' => $post['Cd_price'],
         'Cd_code' => $post['Cd_code'],
      );  

      $sql=DB::table('rcoldricks')->insert($data);
      
      if($sql > 0)
      {

         \Session::flash('message','successfully insert');
         return redirect('Coldriks');
      }  
   }
}
public function Coddelete($colid)
{
   $d=DB::table('rcoldricks')->where('colid',$colid)->delete();
   if($d > 0)
      {

         \Session::flash('message','successfully Deleted');
         return redirect('Coldriks');
      }  
}
public function upcoldsave(Request $request)
{
   $post =$request->all();

   $v    =\Validator::make($request->all(),
         [
         'Cd_name'  => 'required',
         'Cd_price' => 'required',
         'Cd_code'   => 'required',
      ]);

   if($v->fails())
   {
       return redirect()->back()->withError($v->errors());
   }
   else
   {
      $datac=array(
         'Cd_name' => $post['Cd_name'], 
         'Cd_price' => $post['Cd_price'],
         'Cd_code' => $post['Cd_code'],
      );  

      $sql=DB::table('rcoldricks')->where('colid',$post['colid'])->update($datac);
      
      
      if($sql > 0)
      {

         \Session::flash('message','successfully update');
         return redirect('Coldriks');
      }  
   }
}
public function cledit($colid)
{
    $row=DB::table('rcoldricks')->where('colid',$colid)->first();
   return view('Editcold')->with('row',$row );
}
public function FoodDishs()
{
    $res=DB::table('food dish')->get();
     $category1 = DB::table('category')->select('Cid', 'C_name')->get();   
                             
   return view('FoodDish')->with("datas",$res)
                          ->with("recored",$category1);
}

public function Dishsave(Request $request)
{
   $file=$request->file('fd_image');
   $upload="public/upload/";
   $filename=$file->getClientOriginalName();
   $success=$file->move($upload,$filename);
   print_r($success);
   
   $post =$request->all();
   
   $v    =\Validator::make($request->all(),
         [
         'fd_name' => 'required',
         'fd_Price' => 'required',
      ]);

   if($v->fails())
   {
       return redirect()->back()->withError($v->errors());
   }
   else
   {
         $data1=array(
            'fd_name' => $post['fd_name'],
            'fd_Price' => $post['fd_Price'], 
            'C_name'  => $post['cname'],
            'fds_name'=>$post['fdf_name'],
            'fd_image'=>$filename,
             );  

      $sql=DB::table('food dish')->insert($data1);
      
      if($sql > 0)
      {

         \Session::flash('message','successfully insert');
         return redirect('FoodDish');
      }  
   }
}
public function fddelete($fd_id)
{
    $d=DB::table('food dish')->where('fd_id',$fd_id)->delete();
   if($d > 0)
      {

         \Session::flash('message','successfully Deleted');
         return redirect('FoodDish');
      }  
}
public function seebill()
{
      
   $bill= DB::select(DB::raw("SELECT s.tbname as tbname,o.Tb_no as tbno,o.oid as oid,SUM(o.Qty*f.fd_price) as Price FROM `seattable` s,`norder` o,`food dish` f WHERE o.tb_no=s.stid AND f.fd_id=o.It_id AND o.Status=2 GROUP BY o.oid  ORDER BY o.oid DESC"));
   return view("bill")->with('bill',$bill);
}
public function getprint($id)
{
   $data=DB::select(DB::raw("SELECT f.fd_price as Price,o.Qty as Qty,f.fd_name as I_name FROM `food dish` f,norder o WHERE f.fd_id=o.It_id AND o.oid='$id' AND o.Status=2"));
   $gst=DB::table('gst')->select('gst')->first();
   return view("print")->with("print",$data)->with("gst",$gst);
}

public static function tblDetail($tbno)
{
   $data=DB::select(DB::raw("SELECT o.Id as Id,o.Serve as Serve,f.fd_name as I_name,f.fds_name as fl_name,o.Qty as Qty,o.Status as Status FROM `food dish` f,`norder` o WHERE o.It_id=f.fd_id AND o.Tb_no='$tbno' AND o.Status < 2"));
   return $data;
}
public function orderServe(Request $request)
{ 
   $sql=DB::table('norder')->where('Id', $request->get('itid'))
   ->where('Tb_no', $request->get('tbid'))->increment('Serve',$request->get('qty'));
   
   return redirect('Kichansceen');
}

//food Dish Update
public function editDish($fdid)
{
   $category = DB::table('category')->select('Cid', 'C_name')->get();
   $row=DB::table('food dish')->where('fd_id',$fdid)->first();
   return view('EditDish')->with('row',$row)->with("recored",$category);
}
public function DishUpdate(Request $request)
{
   $post =$request->all();

   $v=\Validator::make($request->all(),
         [
         'fd_name'  => 'required',
         'cname' => 'required',
         'fd_Price'   => 'required',
         'fds_name' => 'required',
      ]);

   if($v->fails())
   {
       return redirect()->back()->withError($v->errors());
   }
   else
   {
      $filename="";
      $file=$request->file('fd_image');
      if($file=="")
      {
         $filename=$post['u_image'];
      }
      else
      {
         $filename=$file->getClientOriginalName();
         $suc=$file->move(public_path('/upload/'),$filename);
      }
      
      $datac=array(
         'fd_name' => $post['fd_name'], 
         'C_name' => $post['cname'],
         'fds_name' => $post['fds_name'],
         'fd_Price' => $post['fd_Price'],
         'fd_image' => $filename,
      );  

      $sql=DB::table('food dish')->where('fd_id',$post['Dishid'])->update($datac);
      if($sql > 0)
      {
         \Session::flash('message','successfully update');
         return redirect('FoodDish');
      }
   }
}
public function gst()
{
   $gst = DB::table('gst')->select('gst')->get();
   return view('gst')->with("gst",$gst);
}
public function gstslabs(Request $request)
{
   $post =$request->all();
   $v    =\Validator::make($request->all(),
         [
         'gst' => 'required',]);

   if($v->fails())
   {
       \Session::flash('message','Oops.. Error Occured');
            return redirect('GST');
   }
   else
   {
      $data=array(
            'gst' => $post['gst'], );  

      $sql=DB::table('gst')->where('id','1')->update($data);
      
      if($sql > 0)
      {

         \Session::flash('message','Successfully Inserted');
         return redirect('GST');
      }  
      else
      {
         \Session::flash('message','sOMETHING wENT Wrong !...');
         return redirect('GST');
      }
   }
   return redirect("GST");
}

public function Logout()
{
    \Session::flush();
    return redirect('/');
}
public function viewTable()
{
   $order=DB::select(DB::raw("SELECT s.stid as Tb_no,s.tbname FROM seattable s WHERE s.status=1"));
    return view('viewtable')->with('order',$order);
}
public function AppLogo()
{
    return view("AppLogo");
}
public function PostAppLogo(Request $request)
{
       
      if($request->hasFile('imglogo')) {
         $image = $request->file('imglogo');
         $name = "logo.png";
         $destinationPath = public_path('/logo/');
         $image->move($destinationPath, $name);
         return redirect('AppLogo');
       }
}
   
public function parsal()
{
   $item = DB::table('food dish')->select('*')->get();
   return view('parsal')->with('item',$item);
}
 public function prodcutdata123(Request $request)
    {
        $post=$request->all();
       // $result=DB::select(DB::raw("select * from food dish"));
        return response()->json($post);
    }
public function parsalAdd(Request $request)
{
   $post =$request->all();
   $item=$post['pname'];
   $qty=$post['pqty'];
   $name=$post['pername'];
   if($name=="")
   {
       $name="Cash";
   }
   $sql="";
   date_default_timezone_set('Asia/Kolkata');
   $parsalid= date("dmhis");
     foreach( $item as $key => $n ) 
     {
         $row=DB::table('food dish')->where('fd_name',$item[$key])->pluck('fd_id')->first();
         $parsal=array(
                  'It_id' => $row, 
                  'Qty'  => $qty[$key],
                  'parsal_id'=>$parsalid,
                  'Name'=>$name,
                   );
            $sql=DB::table('parsal')->insert($parsal);
      }
      if($sql > 0)
      {

         \Session::flash('message','Success');
        return redirect('parsalPrint/'.$parsalid);
      }  
}
public function parsalPrint($pid)
{
   $item=DB::select(DB::raw("SELECT f.fd_price as Price,p.Qty as Qty,p.Name as Name,p.parsal_id as P_id,f.fd_name as I_name FROM `food dish` f,parsal p WHERE f.fd_id=p.It_id AND p.parsal_id=$pid"));
   return view('parsalPrint')->with('item',$item);
}
public function sellReport()
{
   return view("sellReport");
}
public function sellreportget(Request $request)
{
   $post=$request->all();
   $sdate=date ("Y-m-d H:i:s",strtotime($post["sdate"]));
   $edate=date ("Y-m-d H:i:s",strtotime($post["edate"]));
   if($post['rep']==0)
   {
      $sql=DB::select(DB::raw("SELECT SUM(o.Qty*f.fd_Price) as Total,s.tbname as tablest FROM `food dish` f,`norder` o,`seattable` s WHERE o.Tb_no=s.stid AND f.fd_id=o.It_id AND o.Time BETWEEN '$sdate' AND '$edate' GROUP BY o.Tb_no"));
      return response()->json($sql);
   }
   if($post['rep']==1)
   {
      $sql=DB::select(DB::raw("SELECT f.fd_name as Item,SUM(o.Qty*f.fd_Price) as Total FROM `food dish` f,`norder` o WHERE o.It_id=f.fd_id AND o.Time BETWEEN '$sdate' AND '$edate' GROUP BY o.It_id;"));
      return response()->json($sql);
   }
   if($post['rep']==2)
   {
      $sql=DB::select(DB::raw("SELECT f.fd_name as Item,SUM(p.Qty*f.fd_Price) as Total FROM `food dish` f,`parsal` p WHERE p.It_id=f.fd_id AND p.Date BETWEEN '$sdate' AND '$edate' GROUP BY p.It_id;"));
      return response()->json($sql);
   }
   return redirect("sellReport");
}

public function msg()
{
    return view("Appmsg");
}
public function Postmsg(Request $request)
{
    $post=$request->all();
    define( 'API_ACCESS_KEY', 'AAAA----FE6F' );

    $data = array("to" => "/topics/OilAdd",
                  "notification" => array( "title" => $post["title"], "body" => $post["msg"],"icon" => "icon.png", "click_action" => "http://shareurcodes.com"));                                                                    
    $data_string = json_encode($data); 
    
    
    $headers = array
    (
         'Authorization: key=' .'AAAAa4lELxA:APA91bHEPuvwWA9dDqpeLxfG1ou5dSyLrPqVBO_GVfquGq5MGEG1VjY992R7yId0K3bmzycME-fH2sGg5DXP0SNE8Vyik0OxSKu9c6uu5eDjexW9073tOFyLppJnQ2XfnH7ecBb8i2vF', 
         'Content-Type: application/json'
    );                                                                                 
                                                                                                                         
    $ch = curl_init();  
    
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );                                                                  
    curl_setopt( $ch,CURLOPT_POST, true );  
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);                                                                  
                                                                                                                         
    $result = curl_exec($ch);
    
    curl_close ($ch);
    return redirect('msg');
}
}

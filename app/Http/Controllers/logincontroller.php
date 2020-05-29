<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class Logincontroller extends Controller
{
   
   public function login(Request $request)
   {
      $post=$request->all();
      $type=$post["Ltype"];
      $pass=$post["Password"];
      $users = DB::table('Su_user')
                    ->where('sunametype', '=',$post["Ltype"])
                    ->Where('su_pass','=',$post["Password"])
                    ->get();
      if(isset($users[0]))
      {
          if(($users[0]->sunametype)=="admin")
          {
              $request->session()->put('admin', 'admin');
              return redirect("parsal");
          }
          
          if(($users[0]->sunametype)=="kadmin")
          {
               $request->session()->put('kadmin', 'kadmin');
              return redirect("Kichansceen");
          }
      }
      return redirect()->back();
    }
   
    
}

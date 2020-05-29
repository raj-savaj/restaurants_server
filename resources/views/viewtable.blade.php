<?php  use App\Http\Controllers\RestorentController; ?>
@extends('master')
@section('content')
  <section class="wrapper" style="margin-top: 0px !important">
    <!-- //market-->
    <div class="market-updates" style="margin-top: 100px">
            <?php $color=1; ?>
            @foreach($order as $ord)
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-<?php if($color>4){$color=$color-5;} echo $color; $color++;?>">
                    
          <div class="col-md-12 market-update-right">
            <h1 style="color:white">{{$ord->tbname}}</h1>
          </div>
           <div class="col-md-12 market-update-left">

                    <table class="table" style="color: white !important">
                       <thead>
                            <th colspan="2" style="color: white !important">Pending</th>
                            <th colspan="2" style="color: white !important">Served</th>
                        </thead>
                        <tbody>
                            <?php 
                                $tbldetail= RestorentController::tblDetail($ord->Tb_no); 
                                for($i=0;$i<count($tbldetail);$i++)
                                {
                                    ?>
                                        <tr>
                                            <td style="color: white !important">{{$tbldetail[$i]->I_name}}</td>
                                            <td style="color: white !important">({{$tbldetail[$i]->Qty-$tbldetail[$i]->Serve}})</td>
                                            <td style="color: white !important">{{$tbldetail[$i]->I_name}}</td>
                                            <td style="color: white !important">({{$tbldetail[$i]->Serve}})</td>
                                        </tr>
                                    <?php
                                }
                             ?> 
                     </tbody>
                    </table>
          </div>
          <div class="clearfix"> </div>
                  
        </div>
      </div>
            @endforeach
    </div>  
</section>
@stop()
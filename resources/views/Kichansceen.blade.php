<?php  use App\Http\Controllers\RestorentController; ?>
<!DOCTYPE html>
<head>
<title>Kitchen Screen | AV Restro</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Restaurant Order Management" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" >

<link href="{{asset('assets/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet"/>

<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="{{asset('assets/css/font.css')}}" type="text/css"/>
<link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">

<script src="{{asset('assets/js/jquery2.0.3.min.js')}}"></script>
<style type="text/css">
    table td,th
    {
         color:white !important;
    }
    @media (min-width: 200px ) and (max-width: 600px) {
        h1{
            font-size: 20px;
            margin-top: 5px;
        }
    }
    .market-update-gd{
            padding-right: 2px !important;
            padding-left: 2px !important;
            padding-bottom: 3px !important;
      }
      .wrapper{
             padding: 0px !important; 
      }
      .market-update-block {
           padding: 1em 0em;
      }
      h1{
        text-align: center;
      }
      .table>tbody>tr>td{
        line-height: 1;
      }
      .table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 3px 3px!important;
      }
</style>
</head>
<body>
	<section class="wrapper" style="margin-top: 0px !important">
		<!-- //market-->
		<div class="market-updates">
            <?php $color=1; ?>
            @foreach($order as $ord)
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-<?php if($color>4){$color=$color-5;} echo $color; $color++;?>">
                    
					<div class="col-md-12 market-update-right">
						<h1 style="color:white">{{$ord->tbname}} <small class="pull-right" style="color: white !important; margin-top:10px;"> {{$ord->per}}</small> </h1>
					</div>
					 <div class="col-md-12 market-update-left">

                    <table width="100%" class="table" style="color: white !important">
                       <thead>
                            <th colspan="2">Pending</th>
                            <th>Process</th>
                            <th colspan="2">Served</th>
                        </thead>
                        <tbody>
        					 <?php 
                                $tbldetail= RestorentController::tblDetail($ord->Tb_no); 
                                for($i=0;$i<count($tbldetail);$i++)
                                {
                                    ?>
                                        <tr>
                                            <td>{{$tbldetail[$i]->fl_name}}</td>
                                            <td>({{$tbldetail[$i]->Qty-$tbldetail[$i]->Serve}})</td>
                                            <td align="center">
                                                @if(($tbldetail[$i]->Qty-$tbldetail[$i]->Serve)==0)
                                                <span style="color: white;" class="glyphicon glyphicon-ok-sign"></span>
                                                @else
                                                <a href="<?php echo 'serveOrder/?itid='.$tbldetail[$i]->Id.'&tbid='.$ord->Tb_no.'&qty=1' ?>"><span style="color: white;" class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a><br>
                                                <a href="<?php echo 'serveOrder/?itid='.$tbldetail[$i]->Id.'&tbid='.$ord->Tb_no.'&qty='.($tbldetail[$i]->Qty-$tbldetail[$i]->Serve) ?>"><span style="color: white;" class="glyphicon glyphicon-forward" aria-hidden="true"></span></a>
                                                @endif
                                            </td>
                                            <td>{{$tbldetail[$i]->fl_name}}</td>
                                            <td>({{$tbldetail[$i]->Serve}})</td>
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
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollTo.js')}}"></script>
<script>
    /*$(window).load(function(){
        setInterval(function()
        { 
            $.ajax({
              type:"get",
              url:"Kichan-data",
              datatype:"html",
              success:function(data)
              {
                 $(".market-updates").html(data);
              }
            });
        }, 3000);
    });*/
</script>
</body>
</html>

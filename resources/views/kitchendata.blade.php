        <?php  use App\Http\Controllers\RestorentController; ?>
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
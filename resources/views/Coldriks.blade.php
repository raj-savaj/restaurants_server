@extends('master')
@section('content')

<section class="wrapper">
        <div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ADD COLDRIKS
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <p style="color:red"><?php echo Session::get('message'); ?></p>
                        <div class="panel-body">
                            <p class="help-block">{{ $errors->first('Cd_name') }}</p>
                            <form role="form" class="form-horizontal" method="post" action="{{action('RestorentController@coldsave')}}" >
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Coldrik-Name</label>
                                    <div class="col-lg-6">
                                        <input type="hidden" name="_token" value="<?=csrf_token();?>">
                                        <input type="text" placeholder="" id="f-name" name="Cd_name" class="form-control">
                                        
                                    </div>
                                    
                                </div>
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Coldrik-price</label>
                                    <div class="col-lg-6">
                                        
                                        <input type="text" placeholder="" id="f-name" name="Cd_price" class="form-control">
                                        
                                    </div>
                                    
                                </div>
                                 <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Coldrik-Code</label>
                                    <div class="col-lg-6">
                                        
                                        <input type="text" placeholder="" id="f-name" name="Cd_code" class="form-control">
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                     
                                        <input type="submit" name="sub" value="ADD" class="btn btn-primary">
                                        <input type="submit" name="sub" value="Cancel" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
               <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      View COLDRIKS
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Srno</th>
            <th>Colddrik Name</th>
            <th>Colddrik Price</th>
           <th>Colddrik Code</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         <?php
          $count = 0;
         
           foreach ($cddata as $row) {
            $count++;

                    ?>
                      
          <tr>
            <td></td>
            <td><?php echo $count?></td>
            <td><?php echo $row -> Cd_name ?></td>
             <td><?php echo $row -> Cd_price ?></td>
             <td><?php echo $row -> Cd_code ?></td>
            <td><span class="text-ellipsis"></span></td>
           
            <td>
              <a href="<?php echo 'coldEdit/'.$row -> colid ?>" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i>
              </a>
             <a href="<?php echo 'coldDelete/'.$row -> colid ?>" class="active" ui-toggle-class="" name="ad" >
              <i class="fa fa-times text-danger text"></i></a>
             <script type="text/javascript">
               var aElems = document.getElementsByName('ad');

for (var i = 0, len = aElems.length; i < len; i++) {
    aElems[i].onclick = function() {
        return confirm("Are you sure you want to Delete?");
    };
}
             </script>
            </td>
          </tr>
           <?php

          }
           ?>        
         <?php echo $cddata->render(); ?>
        </tbody>
      </table>
    

    </div>
   
  </div>
</div>

            </div>
            <div class="row">
               
            </div>
            <!-- page end-->
        </div>
</section>
 <!-- footer -->
          <div class="footer">
            <div class="wthree-copyright">
              <p>© 2018 All rights reserved | Design by <a href="ashtavinayaksoftsolution.in">ashtavinayaksoftsolution</a></p>
            </div>
          </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>

@stop()
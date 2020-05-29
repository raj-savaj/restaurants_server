@extends('master')
@section('content')

<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ADD Food Dish
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <p style="color:green"><?php echo Session::get('message'); ?></p>
                        <div class="panel-body">
                        	<p class="help-block">{{ $errors->first('fd_name') }}</p>
                            <form role="form" class="form-horizontal" method="post" action="{{action('RestorentController@Dishsave')}}" 
                           enctype="multipart/form-data">
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Dish Name</label>
                                    <div class="col-lg-6">
                                    	<input type="hidden" name="_token" value="<?=csrf_token();?>">
                                        <input type="text" placeholder="" id="f-name" name="fdf_name" class="form-control">
                                        
                                    </div>
                                    </div>
                                    <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Disort</label>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="" id="f-name" name="fd_name" class="form-control">
                                        
                                    </div>
                                    </div>
                                   
                                    <div class="form-group has-success">
                                       <label class="col-lg-3 control-label">Category</label>
                                       <div class="col-lg-6">
                                          <select class="input-sm form-control" name="cname">
                                              <option value="0">Select Main Category</option>
                                                @foreach ($recored as $category)
                                                    <option value="{{ $category->C_name }}">{{ $category->C_name }}</option>
                                                @endforeach     
                                          </select>
                                      </div>
                                </div>
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Dish Price</label>
                                    <div class="col-lg-6">
                                      
                                        <input type="text" placeholder="" id="f-name" name="fd_Price" class="form-control">
                                        
                                    </div>
                                   
                                  </div>
                                   <div class="form-group has-success">
                                       <label class="col-lg-3 control-label">Dish Image</label>
                                    <div class="col-lg-6">
                                     
                                        <input type="file" placeholder="" id="fd_image" name="fd_image" class="form-control">

                                        
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
					      View Food Dish
					    </div>
					    <div class="table-responsive">
					      <table id="tbl" class="display">
					        <thead>
					          <tr>
					            <th style="width:20px;">
					            </th>
					            <th>Srno</th>
					            <th>Dish name</th>
					            <th>Disort</th>
					            <th>Category</th>
					            <th>Dish Price</th>
					            <th>Dish Image</th>
					            <th style="width:30px;"></th>
					            <th></th>
					          </tr>
					        </thead>
					        <tbody>
					        <?php
					          $count = 0;
					            foreach ($datas as $row) 
					            {
					           	$count++;
							?>          
					         <tr>
					            <td></td>
					            <td><?php echo $count; ?></td>
					            <td><?php echo $row->fds_name; ?></td>
					            
					            <td><?php echo $row->fd_name; ?></td>
					            <td><?php echo $row->C_name; ?></td>
					            <td><?php echo $row->fd_Price; ?></td>
					            <td><img src="{{asset('upload/'.$row->fd_image)}}" width="150px" height="75px"/></td>
					            <td><span class="text-ellipsis"></span></td>
					            <td>
					             	<a href="<?php echo 'EditDish/'.$row-> fd_id ?>" class="active"><i class="fa fa-check text-success text-active"></i>
					              	</a>
					             	<a href="<?php echo 'foodDelete/'.$row -> fd_id ?>" class="active" ui-toggle-class="" name="ad" >
					              		<i class="fa fa-times text-danger text"></i>
					              	</a>
						            <script type="text/javascript">
						               	var aElems = document.getElementsByName('ad');
										for (var i = 0, len = aElems.length; i < len; i++) 
										{
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
					        </tbody>
					    </table>
					</div>
				</div>
			</div>
        </div>
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

<script>
	$(document).ready( function () {
    $('#tbl').DataTable( {
					responsive: true,
					columnDefs: [
						{ targets: [-1, -3], className: 'dt-body-right' }
					]
				});
} );
</script>
@stop()
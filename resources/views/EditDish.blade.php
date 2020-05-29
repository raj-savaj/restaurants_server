@extends('master')
@section('content')

<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update Food Dish
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                        	<p class="help-block">{{ $errors->first('fd_name') }}</p>
                            <form role="form" class="form-horizontal" method="post" action="{{action('RestorentController@DishUpdate')}}" 
                           enctype="multipart/form-data">
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Dish Name</label>
                                    <div class="col-lg-6">
                                    	<input type="hidden" name="_token" value="<?=csrf_token();?>">
                                        <input type="hidden" name="Dishid" value="<?=$row->fd_id;?>">
                                        <input type="text" placeholder="" id="f-name" name="fd_name" class="form-control" value="<?=$row->fd_name;?>">
                                        
                                    </div>
                                    
                                     <div class="col-sm-5 m-b-xs" style="margin-left: 296px;margin-top: 18px;">
        <select class="input-sm form-control w-sm inline v-middle" name="cname">
          <option value="0">Select Main Category</option>
        @foreach ($recored as $category)
        <option value="{{ $category->C_name }}" @if($category->C_name==$row->C_name){{ "selected" }} @endif>{{ $category->C_name }}</option>
    @endforeach 
         
        </select>
                     
      </div>
                                </div>
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Dish Name</label>
                                    <div class="col-lg-6">
                                      
                                        <input type="text" placeholder="" id="fs-name" name="fds_name" class="form-control" value="<?=$row->fds_name;?>">
                                        
                                    </div>
                                  </div>
                                   
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Dish Price</label>
                                    <div class="col-lg-6">
                                      
                                        <input type="text" placeholder="" id="f-name" name="fd_Price" class="form-control" value="<?=$row->fd_Price;?>">
                                        
                                    </div>
                                  </div>
                                   <div class="form-group has-success">
                                       <label class="col-lg-3 control-label">Dish Image</label>
                                    <div class="col-lg-6">
                                     <input type="hidden" name="u_image" value="<?=$row->fd_image;?>">
                                        <input type="file" id="fd_image" name="fd_image" class="form-control">

                                        
                                    </div>
                                  </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                     
                                        <input type="submit" name="sub" value="Update" class="btn btn-primary">
                                        <input type="submit" name="sub" value="Cancel" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="#">Restorant</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>

@stop()
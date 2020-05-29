@extends('master')
@section('content')

<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Parsal Panel
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <p style="color:red"><?php echo Session::get('message'); ?></p>
                        <div class="panel-body">
                        	<p class="help-block">{{ $errors->first('tbname') }}</p>
                                <form role="form" class="form-horizontal" method="post" 
                                action="{{action('RestorentController@parsalAdd')}}" >
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Name & Per.</label>
                                    
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name - No. of Person" id="per-name" name="pername" class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Item</label>
                                    
                                    <div class="col-lg-6">
                                    	<input type="hidden" name="_token" value="<?=csrf_token();?>">
                                        <input type="text" list="parsal" placeholder="Search Item" id="p-item" name="p-name" class="form-control">
                                        <datalist id="parsal">
                                          @foreach ($item as $par)
                                            <option value="{{ $par->fd_name }}"></option>
                                        @endforeach 
                                        </datalist>
                                    </div>
                                  </div>
                                  <div class="form-group has-success">
                                     <label class="col-lg-3 control-label">Qty</label>
                                    <div class="col-lg-6">
                                   
                                        <input type="text" placeholder="" id="p-qty" name="p-qty" class="form-control">
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <input type="button" name="sub" value="Done" class="add btn btn-primary">
                                        <input type="reset" name="can" value="Cancel" class="btn btn-primary">
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="<?=csrf_token();?>">
                                <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6 form-group">Item</div>
                                <div class="col-lg-1">Qty</div>
                                </div>
                                  <div class="par">

                                  </div>
                                  <div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                      <input type="submit" name="sub" value="Save" class="btn btn-success">
                                    </div>
                                    <div class="col-lg-1"></div>
                                  </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2018. All rights reserved | Design by <a href="#">Restorant</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script>
  $(".add").click(function(e){
    e.preventDefault();
    var data='';
    data+='<div class="row"><div class="col-lg-2"></div><div class="col-lg-6"><input type="text" value="'+$("#p-item").val()+'" name="pname[]" class="form-control form-group"></div><div class="col-lg-1"><input type="text" value="'+$("#p-qty").val()+'" name="pqty[]" class="form-control form-group"></div></div>';
    $(".par").append(data);
    $("#p-item").val('');
    $("#p-qty").val('');
    $("#p-item").focus();
  });
</script>
@stop()
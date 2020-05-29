@extends('master')
@section('content')
<section class="wrapper">
        <div class="form-w3layouts">
  <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          Update SUBCATEGORY
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <p style="color:red"><?php echo Session::get('message'); ?></p>
                        <div class="panel-body">
                        	<p class="help-block">{{ $errors->first('sub_name') }}</p>
                            <form role="form" class="form-horizontal" method="post" action="{{action('RestorentController@subUpdate')}}" >
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Update SubCateory</label>
                                    <div class="col-lg-6">
                                    	<input type="hidden" name="_token" value="<?=csrf_token();?>">
                                        <input type="hidden" name="scid" value="<?=$row->scid;?>">
                                        <input type="text" name="Cid" value="<?=$row->Cid;?>">
                                        <input type="text" placeholder="" id="f-name" name="sub_name" value="<?=$row->sub_name;?>" class="form-control">
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                     
                                        <input type="submit" name="sub" value="UPDATE" class="btn btn-primary">
                                        <input type="submit" name="sub" value="Cancel" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@stop()
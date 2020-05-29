@extends('master')
@section('content')
<section class="wrapper">
        <div class="form-w3layouts">
  <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Screen Logo 
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <p style="color:red"><?php echo Session::get('message'); ?></p>
                        <div class="panel-body">

                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                     <div class="form-group has-success">
                                        <label class="col-lg-3 control-label">Title</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="title" name="title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row" style="margin-top:5px;">
                                    <div class="form-group has-success">
                                        <label class="col-lg-3 control-label">Message</label>
                                        <div class="col-lg-6">
                                            <textarea rows="5" id="msg" name="msg" class="form-control">
                                                
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group" >
                                    <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px">
                                        <input type="submit" name="sub" value="Send" class="btn btn-primary">
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
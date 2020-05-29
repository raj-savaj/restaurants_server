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

                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">PNG Logo</label>
                                    <div class="col-lg-6">
                                        <input type="file" id="f-name" name="imglogo" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px">
                                        <input type="submit" name="sub" value="Upload" class="btn btn-primary">
                                    </div>
                                </div>

                            </form>
                            <div class="col-md-4">
                                <img src="{{ asset('logo/logo.png') }}">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@stop()
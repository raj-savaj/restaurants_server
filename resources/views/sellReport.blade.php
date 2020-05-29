@extends('master')
@section('content')

<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sell Report
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <p style="color:red"><?php echo Session::get('message'); ?></p>
                        <div class="panel-body">
                        	<p class="help-block">{{ $errors->first('tbname') }}</p>
                            <form role="form" id="sellReport" class="form-horizontal" method="post">
                                <div class="form-group has-success">
                                    <label class="col-lg-3 control-label">Start Date</label>
                                    <div class="col-lg-3">
                                    	{{ csrf_field() }}
                                        <input type="date" placeholder="Search Item" id="sdate" name="sdate" class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group has-success">
                                     <label class="col-lg-3 control-label">End Date</label>
                                    <div class="col-lg-3">
                                        <input type="date" placeholder="" id="edate" name="edate" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group has-success">
                                     <label class="col-lg-3 control-label">Report Of</label>
                                    <div class="col-lg-3">
                                        <select name="rep" id="rep" class="form-control"><option value="0">Tables</option><option value="1">Product</option><option value="2">Parsal</option></select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <input type="submit" name="sub" value="Get Report" class="add btn btn-primary">
                                        <input type="reset" name="can" value="Cancel" class="btn btn-danger">
                                        <input type="button" name="pri" value="Print" class="prt btn btn-warning">
                                    </div>
                                </div>
                            </form>
                            <table class="table table-striped b-t b-light" id="printTable">
                                 
                            </table>
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
$("#sellReport").submit(function (e) {
    e.preventDefault();
    $(".table").find("tr").remove();
    var sdate=$("#sdate").val();
    var edate=$("#edate").val();
    if(sdate != "" && edate!= "")
    {
        var p=$("#rep").val();
        $.ajax({
            url: "{{ URL::to('sellreportget')}}",
            data: {"sdate":sdate,"edate":edate,"rep":p,"_token":"{{ csrf_token() }}"},
            dataType:"json",
            type: 'POST',
            beforeSend: function() {
                $(".table").append('<tr align="center"><td colspan="3">Loading..</td></tr>');
            },
            success: function (data) {
                $(".table").find("tr").remove();
               if(p==0)
               {
                    var rw='';
                    var tot=0;
                    rw+='<thead><tr><th>#</th><th>Table Name</th><th>Total</th></tr></thead><tbody>';
                    for(var r=0;r<data.length;r++)
                    {
                        rw+='<tr><td>'+(r+1)+'</td><td>'+data[r].tablest+'</td><td>'+data[r].Total+'</td></tr>';
                        tot=Number(data[r].Total)+Number(tot);
                        
                    }
                    rw+='<tr><td colspan="2"><span style="float:right">Total</span></td><td>'+tot+'</td></tr></tbody>';
                    $(".table").append(rw);
               }
               if(p==1)
               {
                    var rw='';
                    var tot=0;
                    rw+='<thead><tr><th>#</th><th>Item Name</th><th>Total</th></tr></thead><tbody>';
                    for(var r=0;r<data.length;r++)
                    {
                        rw+='<tr><td>'+(r+1)+'</td><td>'+data[r].Item+'</td><td>'+data[r].Total+'</td></tr>';
                        tot=Number(data[r].Total)+Number(tot);
                    }
                    rw+='<tr><td colspan="2"><span style="float:right">Total</span></td><td>'+tot+'</td></tr></tbody>';
                    $(".table").append(rw);
               }
               if(p==2)
               {
                    var rw='';
                    var tot=0;
                    rw+='<thead><tr><th>#</th><th>Item Name</th><th>Total</th></tr></thead><tbody>';
                    for(var r=0;r<data.length;r++)
                    {
                        rw+='<tr><td>'+(r+1)+'</td><td>'+data[r].Item+'</td><td>'+data[r].Total+'</td></tr>';
                        tot=Number(data[r].Total)+Number(tot);
                    }
                    rw+='<tr><td colspan="2"><span style="float:right">Total</span></td><td>'+tot+'</td></tr></tbody>';
                    $(".table").append(rw);
               }
            }
        });
    }
    else
    {
        alert("Plz Fill All The Field");
    }
    
    
});
$(".prt").click(function(e){
    e.preventDefault();
    var divToPrint=document.getElementById("printTable");
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
});
</script>
@stop()
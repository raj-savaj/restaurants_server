@extends('master')
@section('content')

<section class="wrapper">
	
    <div class="panel panel-default">
    <div class="panel-heading">
     Bills
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options="{
        &quot;paging&quot;: {
          &quot;enabled&quot;: true
        },
        &quot;filtering&quot;: {
          &quot;enabled&quot;: true
        },
        &quot;sorting&quot;: {
          &quot;enabled&quot;: true
        }}">
        <thead>
          <tr>
            <th data-breakpoints="xs">ID</th>
            <th>Table No.</th>
            <th data-breakpoints="xs">Bill Amount</th>
            <th>Action</th>
          </tr>
        </thead><?php $c=1;$total=0;?>
          @foreach ($bill as $billd) 
          <tr>
            <td><?php echo $c;$c++; ?></td>
            <td>{{$billd->tbname}}</td>
            <td>{{$billd->Price}}</td>
            <td><button style="font-size: 20px;padding: 2px 6px; border-radius: 55%; " target="_blank" class="btn btn-success" onclick="window.open('print_bill/<?php echo $billd->oid; ?>')"><i class="fa fa-print" ></i></button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
  /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


  $(".print").click(function(){
    var o_id=this.id;
     $.ajax({
            type: 'POST',
               url: 'print_bill',
               dataType: 'json',
               data: {id:o_id,"_token": "{{ csrf_token() }}"},
               success: function (data) {
                for(var a=0;a<data.length;a++)
                {
                  alert(data[a].order_id);
                }
               },
               error: function (data) {
                    alert("Something Went Wrong");
               }
        });
  });*/
</script>

@stop()
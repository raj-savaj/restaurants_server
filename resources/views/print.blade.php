<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Print Bill</title>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    .main
    {
    	width: 750px;
    	height: 995px;
    	padding:20px;
    	border: 1px solid black;
    }
    .logo
    {
	    max-width: 200px;
	    max-height: 200px;
	    margin-top:10px;
    }
    .add-side
    {
    	float:right;
	   top:0;
	   right:0;
    }
    .tbl
    {
    	border: 1px solid black;
    	border-right: 0px;
    	margin-top: 45px;
    }
    .tbl th
    {
    	border-bottom: 1px solid black;
    	border-right: 1px solid black;
    }
    .tbl td
    {
    	border-right: 1px solid black;
    }
    .tbl tr:last-child td
    {
    	border-top: 1px solid black;
    }
</style>

<style type="text/css">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    .main
    {
    	width: 750px;
    	height: 28.7cm;
    	padding:20px;
    	border: 1px solid black;
    }
    .logo
    {
	    max-width: 200px;
	    max-height: 200px;
	    margin-top:10px;
    }
    .add-side
    {
    	float:right;
	   top:0;
	   right:0;
    }
    .tbl
    {
    	border: 1px solid black;
    	border-right: 0px;
    	margin-top: 45px;
    }
    .tbl th
    {
    	border-bottom: 1px solid black;
    	border-right: 1px solid black;
    }
    .tbl td
    {
    	border-right: 1px solid black;
    }
    .tbl .tr
    {
    	border-top: 1px solid black;
    }
</style>
</head>
<body style="font-family: sans-serif;">
<div class="main">
	
	<div class="add-side">
		<p>+91 9999999999</p>
		<!--<p>GST : 123456789AA88Q</p>-->
	</div>
	<br>
	<div>
		<!--<h2 style="line-height: 0;">Radhika Resturant</h2>
		<p>Lathi Road,<br>
		Amreli</p>-->
	</div>
	<table>
	<tr style="height: 33px;">
		<td><b>Bill Date : <?php echo Date(now()); ?></b></td>
	</tr>
	</table>
	<table width="90%" align="center" cellpadding="10px" class="tbl" cellspacing="0">
	<tr>
		<th>SI No.</th>
		<th>Description Of Goods</th>
		<th>QTY</th>
		<th>Rate Per Qty</th>
		<th>Total Rate</th>
	</tr>
	<?php $amount=0; $sr=1;?>
	@foreach($print as $p)
	<tr>
		<td><?php echo $sr;$sr++; ?></td>
		<td>{{$p->I_name}}</td>
		<td>{{$p->Qty}}</td>
		<td>{{$p->Price}}</td>
		<td>{{$p->Qty*$p->Price}}<?php $amount+=($p->Qty*$p->Price); ?></td>
	</tr>
	@endforeach
	<tr>
		<td colspan="4" class="tr" style="text-align:end">Total</td>
		<td class="tr"><?php echo $amount; ?></td>
	</tr>
	
	</table>
</div>
</body>
<script type="text/javascript">
window.print();
</script>
</html>

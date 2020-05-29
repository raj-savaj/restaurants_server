<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Receipt</title>

  <!-- Normalize or reset CSS with your favorite library -->
    <link href="{{ asset("assets/tcss/normalize.min.css") }}" rel="stylesheet">  
    <link href="{{ asset("assets/tcss/paper.css") }}" rel="stylesheet">

  <!-- Load paper.css for happy printing -->
    <link href="{{ asset("assets/tcss/tagline.css") }}" rel="stylesheet">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style></style>

  <!-- Custom styles for this document -->
  <style>
    body   { font-family: serif }
    h1     { font-size: 40pt; line-height: 5mm}
    h2, h3 { font-family: 'Tangerine', cursive; font-size: 20pt; line-height: 18mm }
    h4     { font-size: 15pt; line-height: 1mm }
    h2 + p { font-size: 15pt; line-height: 1mm }
    h3 + p { font-size: 15pt; line-height: 1mm }
    li     { font-size: 15pt; line-height: 9mm }
    h1      { margin: 0 }
    h1 + ul { margin: 2mm 0 5mm }
    h2, h3  { margin: 0 3mm 3mm 0; float: left }
    h2 + p,
    h3 + p  { margin: 0 0 3mm 50mm }
    h4      { margin: 2mm 0 0 5mm; border-bottom: 2px solid black }
    h4 + ul { margin: 5mm 0 0 5mm }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet">
<h1 style="font-size: 20px !important">Akshar Restaurant</h1>
    
      <p style="line-height: 6px !important; font-size: 12px !important">+91 9999999999</p>
      <p style="line-height: 12px !important; font-size: 12px !important">Amreli</p>
      <p style="line-height: 12px !important; font-size: 12px !important">Parsal No {{$item[0]->P_id }}</p>
      <p style="line-height: 12px !important; font-size: 12px !important">Bill To : {{$item[0]->Name }}</p>
    <article>
      <hr>
      <?php $amount=0; ?>
      @foreach($item as $b)
      <p style="font-size: 12px !important">{{ $b->I_name }} | Rs. {{ $b->Price }} |</p>
          <p style="font-size: 12px !important">Qty {{ $b->Qty }} | Total {{$b->Qty*$b->Price}}<?php $amount+=($b->Qty*$b->Price); ?></p>
          <hr>
      @endforeach
      <p>Payable Amount <?php echo $amount; ?></p>
    </article>

  </section>

</body>
<script>
  window.print(); 
</script>

</html>

<!DOCTYPE html>
<head>
<title>@yield("title")</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" >
<link href="{{asset('assets/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet"/>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('assets/css/font.css')}}" type="text/css"/>
<link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet"> 
<script src="{{asset('assets/js/jquery2.0.3.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.css') }}">
<script type="text/javascript" charset="utf8" src="{{ asset('assets/DataTables/datatables.js') }}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="" class="logo">
      AV Resto
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
   
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{ URL::to('viewTable')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                  <li class="sub-menu">
                    <a href="{{ URL::to('tableseat')}}">
                        <i class="fa fa-th"></i>
                        <span>Seating Tables</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{ URL::to('Category')}}">
                        <i class="fa fa-book"></i>
                        <span>Category</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{ URL::to('FoodDish')}}">
                        <i class="fa fa-cutlery"></i>
                        <span>Menu</span>
                    </a>
                   
                </li>
                 <li class="sub-menu">
                    <a href="{{ URL::to('Bill')}}">
                        <i class="fa fa-credit-card-alt"></i>
                        <span>Bill</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{ URL::to('parsal')}}">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Parsal</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{ URL::to('sellReport')}}">
                        <i class="fa fa-bar-chart"></i>
                        <span>Sell Report</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{ URL::to('Kichansceen')}}">
                        <i class="fa fa-television"></i>
                        <span>Kitchen Screen</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{ URL::to('GST')}}">
                        <i class="fa fa-inr"></i>
                        <span>GST</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{ URL::to('Logout')}}">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
                 <li class="sub-menu">
                    <a href="{{ URL::to('AppLogo')}}">
                        <i class="fa fa-tasks"></i>
                        <span>AppLogo</span>
                    </a>
                </li>
                
                 <li class="sub-menu">
                    <a href="{{ URL::to('msg')}}">
                        <i class="fa fa-tasks"></i>
                        <span>App Message</span>
                    </a>
                </li>
                
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
     @yield('content')
<!--main content end-->
</section>

<!-- morris JavaScript -->  

<!-- calendar -->
   
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>

<script src="{{asset('assets/js/jquery.scrollTo.js')}}"></script>
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
       jQuery('.small-graph-box').hover(function() {
          jQuery(this).find('.box-button').fadeIn('fast');
       }, function() {
          jQuery(this).find('.box-button').fadeOut('fast');
       });
       jQuery('.small-graph-box .box-close').click(function() {
          jQuery(this).closest('.small-graph-box').fadeOut(200);
          return false;
       });
       
        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }
        
        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
            
            ],
            lineColors:['#eb6f6f','#926383','#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });
        
       
    });
    </script>
<!-- calendar -->
    <script type="text/javascript" src="js/monthly.js"></script>
    <script type="text/javascript">
        $(window).load( function() {

            $('#mycalendar').monthly({
                mode: 'event',
                
            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

        switch(window.location.protocol) {
        case 'http:':
        case 'https:':
        // running on a server, should be good.
        break;
        case 'file:':
       
        }

        });
    </script>
    <!-- //calendar -->
</body>
</html>

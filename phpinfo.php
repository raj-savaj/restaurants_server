<!DOCTYPE html>
<html lang="en">
     <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Ashtavinayak</title>

        <!-- core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/images/ico/avico.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        <script src="js/jquery.js" type="text/javascript"></script>
        <style>
            .activeMenu { 
                background-color: #c52d2f;
            }
        </style>

        <script>
            $(document).ready(function() {
                $("#hederMenu li a").removeClass('activeMenu');
                $("#hederMenu li:eq(1) a").addClass('activeMenu');
            });
        </script>
    </head>

    <body class="homepage">
        <?php
        include './Header.php';
        ?>

        <section id="main-slider" class="no-margin">
            <div class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#main-slider" data-slide-to="1"></li>
                    <li data-target="#main-slider" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="item active" style="height:500px;background-size: 100% 500px;background-image: url(images/php/php3.jpg)">

                    </div><!--/.item-->

                    <div class="item" style="height:500px;background-size: 100% 500px;background-image: url(images/php/php2.png)">

                    </div><!--/.item-->

                    <div class="item" style="height:500px;background-size: 100% 500px;background-image:url(images/php/php1.jpg)">

                    </div><!--/.item-->
                </div><!--/.carousel-inner-->
            </div><!--/.carousel-->
            <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
                <i class="fa fa-chevron-left"></i>
            </a>

            <a class="next hidden-xs" href="#main-slider" data-slide="next">
                <i class="fa fa-chevron-right"></i>
            </a>
        </section><!--/#main-slider-->

        <div class="row" style="margin-left:25px;margin-right:25px;margin-top:25px;padding-bottom:0px;">
            <div class="col-md-8 center wow fadeInDown" style="padding-bottom:10px">
                <h2 style="text-align:left;font-family: Bookman Old Style;color: #0182C4;border-bottom:2px solid #0182C4">Learn PHP Technology</h2>
                <p style="text-align: justify;font-size:18px;color: black;font-family: Bookman Old Style">PHP is a server-side scripting language designed for web development but also used as a general-purpose programming language. As of January 2013, PHP was installed on more than 240 million websites (39% of those sampled) and 2.1 million web servers. Originally created by Rasmus Lerdorf in 1994, the reference implementation of PHP (powered by the Zend Engine) is now produced by The PHP Group. While PHP originally stood for Personal Home Page, it now stands for PHP: Hypertext Preprocessor, which is a recursive backronym.
                    PHP code can be simply mixed with HTML code, or it can be used in combination with various templating engines and web frameworks. PHP code is usually processed by a PHP interpreter, which is usually implemented as a web server's native module or a Common Gateway Interface (CGI) executable. After the PHP code is interpreted and executed, the web server sends resulting output to its client, usually in form of a part of the generated web page; for example, PHP code can generate a web page's HTML code, an image, or some other data. PHP has also evolved to include a command-line interface (CLI) capability and can be used in standalone graphical applications.
                </p>
            </div>
            <div class="col-md-3 webappimg center wow fadeInDown" style="margin-right:10px;">
                <img src="/images/php/phpicon.jpg" class="img-responsive">
            </div>

        </div>

        <!--        <div class="row" style="margin-left:25px;margin-right:25px;">
                    <div class="col-md-8 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" style="">
                        <h2 style="text-align:left;font-size:20px;color: #0182C4;font-family: Bookman Old Style;border-bottom:2px solid #0182C4">Our Students Developed Project in Asp.Net</h2>
                        <ul>
                            <li style="text-align:left;font-size:18px;color:black;font-family: Bookman Old Style">Restaurant Management System</li>
                            <li style="text-align:left;font-size:18px;color:black;font-family: Bookman Old Style">Payroll management System</li>
                            <li style="text-align:left;font-size:18px;color:black;font-family: Bookman Old Style">Time Attendance using Bio-Matrix</li>
                            <li style="text-align:left;font-size:18px;color:black;font-family: Bookman Old Style">Employee Leave management System</li>
                        </ul>
                    </div>
                </div>-->

        <div class="row" style="margin-left:25px;margin-right:25px;margin-bottom:10px;">
            <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" style="">
                <h2 style="text-align:left;font-size:20px;color: #0182C4;font-family: Bookman Old Style;border-bottom:2px solid #0182C4">Why join Ashtavinyak Soft Solution</h2>
                <ul class="studDev">
                    <li style="text-align:justify;font-size:18px;color:black;font-family: Bookman Old Style"><b>Training by PHP Professionals :</b> You will get trained by PHP professionals who have 3+ years of experience. Our best trainers are Mr. Dhaval K. Mistry</li>
                    <li style="text-align:justify;font-size:18px;color:black;font-family: Bookman Old Style"><b>Problem Solving Team:</b> We have experts on PHP training who are ready to help the students for any PHP problems.</li>
                    <li style="text-align:justify;font-size:18px;color:black;font-family: Bookman Old Style"><b>Project Development:</b> We develop projects using PHP with MVC Architecture from very core in front of students. We make you able to develop projects not just providing project.</li>
                    <li style="text-align:justify;font-size:18px;color:black;font-family: Bookman Old Style">Good job assistance</li>
                    <li style="text-align:justify;font-size:18px;color:black;font-family: Bookman Old Style">You will get an opportunity to work on <b>real time projects</b></li>
                    <li style="text-align:justify;font-size:18px;color:black;font-family: Bookman Old Style">Interaction with Industry Experts</li>
                    <li style="text-align:justify;font-size:18px;color:black;font-family: Bookman Old Style">Small Batches to focus on each student</li>
                    <li style="text-align:justify;font-size:18px;color:black;font-family: Bookman Old Style">You will get a chance to involve in <b>live project.</b></li>
                    <li style="text-align:justify;font-size:18px;color:black;font-family: Bookman Old Style">We provide Training letter on Training completion.</li>
                </ul>
            </div>
        </div>

        <?php include './Footer.php'; ?>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/wow.min.js"></script>
    </body>
</html>

<!--/**
 * Created by JetBrains PhpStorm.
 * User: shengchao
 * Date: 4/2/13
 * Time: 2:12 PM
 * To change this template use File | Settings | File Templates.
 */
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CS242 Final Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="shengchao huangfu" content="CS242 Final Project">
    <!--script src="http://code.jquery.com/jquery.js"></script-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="ui/min/jquery.ui.map.full.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <script src="JMaps.js"></script>
    <link rel="stylesheet" type="text/css" href="Default.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" >
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body style="background: url('https://www.inspiredfitness.com/wp-content/uploads/2012/10/Do-YOu-Feel-Good.jpg')">

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">

        <div class="container" style="z-index:999">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="http://localhost/index.php">CS242</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="http://localhost/index.php">Home</a></li>
                </ul>
            </div>
            <input class="navbar-search" id="search-query" type="text" placeholder="Search">
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">
    <!-- Main hero unit for a primary marketing message or call to action -->
    <div class="hero-unit" style="background: url('http://www.library.uiuc.edu/grainger/building/images/enginee2.jpg')" >
        <h1 style="color:rgb(163, 21, 21); font-size:50px">Chinese Restaurant On Campus</h1>
    </div>

    <!-- Example row of columns -->
    <div class="row">
        <div class="span7">
            <div id="map_canvas" style="width:650px;height:457px"></div>
            <button id='currentLocation' class="btn btn-info btn-small" style="z-index: 99; position: relative; bottom: 45px; left: 610px;">
                <i class="icon-white icon-map-marker"></i>
            </button>
        </div>
        <div class='row-fluid'>
            <div class="span5" id="list" style='overflow-y:scroll;width:500px ; height:457px; background-color:#eee'>
                <div id="myCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <img src="image/pic/chinese_takeout.gif" style='height:457px;width:500px'>
                            <div class="carousel-caption">
                                <h4>Chinese Restaurant On Campus</h4>
                                <p>This website provides all the details about Chinese restaurant on Campus</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="image/pic/chongqing.jpg" style='height:457px;width:500px'>
                            <div class="carousel-caption">
                                <h4>Chongqing Hot Spicy Chicken</h4>
                                <p>one of the more popular Sichuan dishes. The juicy and wholesome chicken pieces are well blended in and seasoned with deliciously spicy condiments of generous amounts of red hot chilli and sichuan peppers.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="image/pic/chinese-food.jpg" style='height:457px;width:500px'>
                            <div class="carousel-caption">
                                <h4>Chinese Cuisine</h4>
                                <p>Chinese cuisine includes styles originating from the diverse regions of China, plus styles of Chinese people in other parts of the world.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="image/pic/rowat.jpg" style='height:457px;width:500px'>
                            <div class="carousel-caption">
                                <h4>Style and Tastes</h4>
                                <p>Styles and tastes also varied by class, region, and ethnic background. This led to an unparallelled range of ingredients, techniques, dishes and eating styles in what could be called Chinese food.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="image/pic/rice.jpg" style='height:457px;width:500px'>
                            <div class="carousel-caption">
                                <h4>Chicken Fried Rice</h4>
                                <p>Chicken, rice, soy sauce and shredded egg stir fried together. This is a very simple recipe. It is easy, but tasty! Note: Never use rice that you have just cooked.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="dialog" title="Basic dialog" style="z-index: 999999; max-height: 400px; overflow-x: visible; overflow-y: auto">
        </div>
    </div>
    <footer>
        <p>&copy; Shengchao Huangfu 2013</p>
    </footer>

</div> <!-- /container -->

</body>
</html>






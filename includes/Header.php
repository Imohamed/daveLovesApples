<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Full Slider - Start Bootstrap Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/full-slider.css" rel="stylesheet">
        <link href="css/LeannesCSS.css" rel="stylesheet">



    </head>

    <body>

        <?php
        /*         * *******************    SESSION   ************************ */
        // start the session //
        session_start();

        //var_dump($_SESSION);


        /* Autoloading Classes
         * Whenever your code tries to create a new instance of a class
         * that PHP doesn't know about, PHP automatically calls your 
         * __autoload() function, passing in the name of the class it's
         * looking for. Your function's job is to locate and include the 
         * class file, thereby loading the class. 
         */
        function __autoload($class) {
            require_once 'config/' . $class . '.php';
        }

        //instantiate the database handler
        $dbh = new DbHandler();
        //print_r($dbh);
        //exit();
        ?>

        <!-- Navigation -->

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Start Bootstrap</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container">
                        
        
        
                         Brand and toggle get grouped for better mobile display 
                        <div class="navbar-header">                 
                            <button type="button" class="navbar-toggle" data-toggle="collapse" 
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>                
                        </div>
        
                        
                         Collect the nav links, forms, and other content for toggling 
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li>
                                <img class="logo" src="images/Umbrella.png" alt="">
                                </li>
                                <li>
                                    <a class="landingnav" href="#">Register</a>
                                </li>
                                <li>
                                    <a class="landingnav" href="#">Log In</a>
                                </li>                   
                                <div class="input-group" >
                                            <div class="input-group-btn search-panel">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <span id="search_concept">Choose Category: </span> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#contains">Photographers</a></li>
                                                    <li><a href="#its_equal">Bands and Musicians</a></li>
                                                    <li><a href="#greather_than">Artists</a></li>
                                                    <li><a href="#less_than">Bakers and Cake Decorators</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#all">All Categories</a></li>
                                                </ul>
                                            </div>
                                            <input type="hidden" name="search_param" value="all" id="search_param">         
                                            <input type="text" class="form-control" name="x" placeholder="Search term...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                            </span>
                                        </div>
                          </ul>
                                                <form class="navbar-form" role="search">
                                                    <div class="input-group add-on">
                                                        <input class="form-control" placeholder="SEARCH" name="srch-term" id="srch-term" type="text">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                        </div>
                         /.navbar-collapse 
                    </div>
                     /.container 
                </nav>
        
        <!-- Page Content -->

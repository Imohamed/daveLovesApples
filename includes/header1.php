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
        <!--        <link href="css/LeannesCSS.css" rel="stylesheet">-->
        <link href="css/leanne.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

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
                    <!--                    <a class="navbar-brand" href="#">Start Bootstrap</a>-->
                    <img class="logo" src="images/Umbrella.png" alt="">
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>

                        </li>
                        <li>
                            <a href="#">Register</a>
                        </li>
                        <li>
                            <a href="#">Login</a>
                        </li>
                        <li>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept">Choose Category:</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/CoveredInc/home_1.php?cat=1">Photographers</a></li>
                                    <li><a href="/CoveredInc/home_1.php?cat=3">Bands and Musicians</a></li>
                                    <li><a href="/CoveredInc/home_1.php?cat=2">Artists</a></li>
                                    <li><a href="/CoveredInc/home_1.php?cat=4">Bakers and Cake Decorators</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/CoveredInc/">All Categories</a></li>
                                </ul>  
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="path/to/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
 
 <!--optionally if you need to use a theme, then include the theme file as mentioned below--> 
<link href="path/to/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="path/to/js/star-rating.js" type="text/javascript"></script>
 
 <!--optionally if you need to use a theme, then include the theme file as mentioned below--> 
<script src="path/to/themes/krajee-svg/theme.js"></script>
 
 <!--optionally if you need translation for your language then include locale file as mentioned below--> 
<script src="path/to/js/locales/{lang}.js"></script>

<script>
    $("#input-id").rating();
    $("#input-id").rating({min:1, max:5, step:2, size:'lg'});
</script>


<?php include 'includes/Header1.php';
?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row">

    <div class="col-md-2">
        <p class="lead">Shop Name</p>
        <!--                <div class="list-group">
                            <a href="#" class="list-group-item">Category 1</a>
                            <a href="#" class="list-group-item">Category 2</a>
                            <a href="#" class="list-group-item">Category 3</a>
                        </div>-->
        <div>
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept">Filter by</span> <span class="caret"></span>
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

        </div>
    </div>

    <div class="col-md-9">


        <div class="row">
            <?php
            if ((isset($_GET['cat'])) && (is_numeric($_GET['cat']))) {

                $cat = $_GET['cat'];

                $data = $dbh->getProvidersByCat($cat);
                $data1 = $dbh->getCategory($cat);
//                    var_dump($data);
//                    var_dump($data1);
//                    exit();
                //var_dump($data);
                //exit();
//        array (size=5)
//          'sp_id' => string '1' (length=1)
//          'sp_company' => string 'Generator Photography' (length=21)
//          'type_description' => string 'photographers' (length=13)
//          'sp_style' => string '' (length=0)
//          'sp_city' => string 'Windsor' (length=7)


                if ($data['error'] == false && $data1['error'] == false) {
                    $providers = $data['items'];
                    $category = $data1['items'][0]['type_description'];
               
//                    var_dump($category);
                    

                    if (empty($providers)) {
                        //no providers with that category
                        echo '<h3>No information for this category.</h3>';
                    } else {
                        echo "<h3>$category</h3>";
                        //display providers
                        foreach ($providers as $item):
                            $id = $item['sp_id'];
                            $name = $item['sp_company'];
                            $type = $item['type_description'];
                            $style = $item['sp_style'];
                            $city = $item['sp_city'];
                            
                            echo
                            "<div class='col-sm-3 col-lg-3 col-md-3'>
                            <div class='thumbnail'>
                                <img src='images/$id.jpg' alt=''>
                                <div class='caption'>
                                    <h4 class='pull-right'>$city</h4>
                                    <h4><a href='profile.php?id=$id'>$name</a>
                                    </h4>
                                    <p>$type</p>
                                    <p>$style</p>
                                </div>
                                <div class='ratings'>
                                    <p class='pull-right'>15 reviews</p>
                                    <p>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                    </p>
                                </div>
                            </div>
                        </div>";

                        endforeach;
                    }
                }
            }else {
                echo "<h3>This page has been accessed in error.</h3>";
            }
            ?>

        </div>

    </div>

</div>

</div>
<!-- /.container -->

<?php
include './includes/Footer.php';


<?php
include './includes/header1.php';
?>

<br>
<br>
<br>
<br>
<br>
<?php
if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
    //get single article for particular id
    $id = $_GET['id'];
    //populate local variable called $data with single article 
    //by calling the getArticle method in the DbHandler class
    $data = $dbh->getProvider($id);
    //var_dump($data);
    if ($data['error'] == false) {
        $profileItems = $data['items'];


        if (empty($profileItems)) {
            //no article with that id
            echo '<h3>No information for this Company.</h3>';
        } else {
            //display article info
            foreach ($profileItems as $item):
                $name = $item['sp_company'];
                $contactName = $item['contact'];
                $description = $item['sp_description'];
                $email = $item['sp_email'];
                $category = $item['sp_category'];
                $style = $item['sp_style'];
                $city = $item['sp_city'];
                $url = $item['sp_url'];

            endforeach;
        }
    }
}else {
    echo "<h3>This page has been accessed in error.</h3>";
}
?>

</section>
<section id = "features" class = "features">
    <div class = "container">
        <div class = "row">
            <div class = "col-md-4">
                <div class = "device-container">
                    <!--<div class = "device-mockup iphone6_plus portrait white"> -->
                    <div class = "device">
                        <div class = "screen">
                            <!--Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else!-->
                            <img src = "<?php echo "images/$id.jpg"; ?>" class = "img-responsive" alt = "" style = "border:lightgray solid 1px;"> </div>

                        <div class = "button">


                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Contact</button>

                            <!----------- CONTACT -------------->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><strong>Contact <?php echo $name ?></strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            <!--<div class="page-header">-->
                                            <div class="container">
                                                <!--                                                    <h2>Contact Us</h2>-->
                                                <?php
                                                if ($_POST) {
                                                    //var_dump($_POST) ;
                                                    /*  Validation Start */
                                                    //Array for storing validation errors
                                                    $email_errors = array();

                                                    //1.check for firstname (characters, apos, period, space and dash b/w 2 and 60
                                                    if (preg_match('/^[A-Z \'.-]{2,60}$/i', $_POST['firstname'])) {
                                                        $firstname = trim($_POST['firstname']);
                                                    } else {
                                                        $email_errors['firstname'] = 'Please enter your firstname!';
                                                    }

                                                    //2.check for firstname (characters, apos, period, space and dash b/w 2 and 60
                                                    if (preg_match('/^[A-Z \'.-]{2,60}$/i', $_POST['lastname'])) {
                                                        $lastname = trim($_POST['lastname']);
                                                    } else {
                                                        $email_errors['lastname'] = 'Please enter your lastname!';
                                                    }

                                                    //3.check for email (valid email address format)
                                                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                                        $email = trim($_POST['email']);
                                                    } else {
                                                        $email_errors['email'] = 'Please enter a valid email!';
                                                    }

                                                    //3.check for message (characters, apos, comma, dash, question mark, space
                                                    //                     b/w 2 and 500 
                                                    if (preg_match('/^[A-Z \',.-?]{2,500}$/i', $_POST['message'])) {
                                                        $message = trim($_POST['message']);
                                                    } else {
                                                        $email_errors['message'] = 'Please enter a valid message!';
                                                    }


                                                    /* Validation End */
                                                    if (empty($email_errors)) {
                                                        $fullname = $firstname . ' ' . $lastname;

                                                        $messageHTML = "<p><strong>Message From:</strong>  $fullname</p>
                                <p><strong>Email:</strong> <a href='mailto:$email'>$email</a></p>
                                <p><strong>Message:</strong> $message</p>";

                                                        $messageTEXT = "Message From:  $fullname\n
                                Email: $email\n
                                Message: $message\n";

                                                        //test mailing class 
                                                        $mail = new sendMail($email, $fullname, 'Covered Inquiry', 
                                                                             $messageHTML, $messageTEXT, 'leanneoulton@gmail.com', 
                                                                             $fullname, 'leanneoulton@gmail.com', 'Leanne Williston');

                                                        //Send the email
                                                        $result = $mail->SendMail();
                                                        if ($result) {
                                                            //success
                                                            header('location:mailsent.php');
                                                        } else {
                                                            //fail
                                                            header('location:mailerror.php');
                                                        }
                                                    } else {
                                                        //Validation Errors: Display Errors
                                                        //var_dump($email_errors);
                                                        echo '<div class="alert alert-danger">';
                                                        echo '<ul>';
                                                        foreach ($email_errors as $error) {
                                                            echo "<li>$error</li>";
                                                        }
                                                        echo '</ul>';
                                                        echo '</div> ';
                                                    }
                                                }
                                                ?>
                                                <form class="form-horizontal" role="form" method="post" action="profile.php">
                                                    <div class="form-group">
                                                        <label for="firstname" class="col-sm-1 control-label">First Name</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="firstname" id="firstname" 
                                                                   oninvalid="this.setCustomValidity('Please enter first name')" 
                                                                   oninput="setCustomValidity('')"
                                                                   placeholder="Enter first name" required autofocus
                                                                   value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <label for="lastname" class="col-sm-1 control-label">Last Name</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="lastname" id="lastname" 
                                                                   oninvalid="this.setCustomValidity('Please enter last name')" 
                                                                   oninput="setCustomValidity('')"
                                                                   placeholder="Enter last name" required
                                                                   value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
                                                        </div>
                                                    </div>            
                                                    <div class="form-group">
                                                        <label for="email" class="col-sm-1 control-label">Email</label>
                                                        <div class="col-sm-4">
                                                            <input type="email" class="form-control" name="email" id="email" 
                                                                   oninvalid="this.setCustomValidity('Please enter email')" 
                                                                   oninput="setCustomValidity('')"                   
                                                                   placeholder="Enter email" required
                                                                   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message" class="col-sm-1 control-label">Message</label>
                                                        <div class="col-sm-4">                
                                                            <textarea class="form-control" rows="6" name="message" id="message"
                                                                      oninvalid="this.setCustomValidity('Please enter message')" 
                                                                      accesskey=""oninput="setCustomValidity('')"                   
                                                                      placeholder="Enter your message" required></textarea>
                                                            <i class="fa fa-pencil form-control-feedback"></i>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-success">Send</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--</div>-->


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Rate & Review</button>
                            <!-----------  RATE/REVIEW  ------------>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Favorite</button>
                            <!--------- FAVORITE  ------------->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--</div> -->
                </div>
            </div>


            <div class = "profile">
                <div class = "row">

                    <div class = " col-md-offset-1 col-md-5">

                        <table class = "table table-user-information">

                            <tbody>
                                <tr>
                            <h3 style = 'color:black; text-indent: 2em;'><strong><?php echo $name; ?></strong></h3>
                            </tr>
                            <tr>
                                <td>Name:</td>
                                <td>
                                    <?php echo $contactName; ?>
                            </tr>
                            <tr>
                                <td>Location:</td>
                                <td><?php echo $city; ?></td>
                            </tr>
                            <tr>
                                <td>Style:</td>
                                <td><?php echo $style; ?></td>
                            </tr>                                               
                            <tr>
                                <td>Website:</td>
                                <td><a href="gradsfinder.com">www.gradsfinder.com</a></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><a href="mailto:info@support.com">info@support.com</a></td>
                            </tr>
                            <td>Description:</td>
                            <td>
                                <p><?php echo $description; ?></p>
                            </td>

                            </tr>

                            </tbody>
                        </table>

                        <br>


                    </div>

                </div>
            </div>

        </div>
</section>

<?php
include './includes/Footer.php';


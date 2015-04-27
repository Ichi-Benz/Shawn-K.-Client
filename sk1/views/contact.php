<?php
$msg='';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $recaptcha=$_POST['g-recaptcha-response'];
    if(!empty($recaptcha))
    {
        include("getCurlData.php");
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret='6Le35v0SAAAAANIBkyIcMr52WaBY1MqsZrQbKdmv';
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        $res=getCurlData($url);
        $res= json_decode($res, true);
        if($res['success'])
        {
            $Name = Trim(stripslashes($_POST['Name']));
            $Email = Trim(stripslashes($_POST['Email']));
            $Message = Trim(stripslashes($_POST['Message']));
            $EmailTo = "info@divinedecluttering.ca";
            $Subject = "Email from " . $Name;
            $EmailFrom = $Email;

            // validation
            $validationOK=true;
            if (!$validationOK) {
                print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
                exit;
            }

            // prepare email body text
            $Body = "";
            $Body .= "Name: ";
            $Body .= $Name;
            $Body .= "\n";
            $Body .= "Email: ";
            $Body .= $Email;
            $Body .= "\n";
            $Body .= "Message: ";
            $Body .= $Message;
            $Body .= "\n";

            // send email
            $success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
        }
        else
        {
            $msg="Please re-enter your reCAPTCHA.";
        }
    }
    else
    {
        $msg="Please re-enter your reCAPTCHA.";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Divine Decluttering</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
    <link href="../css/main.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="../js/slideshow.js" type="text/javascript"></script>
    <style>
        body{
            background-image: url("../images/purple wallpaper.jpg");

        }
    </style>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="container" style="margin-top: 200px;margin-bottom: 25px">
    <div class="row">
        <div class="col-xs-3">
            <img style="height: 525px;width: 100%;position: absolute;top: -110px;left: 0px" src="../images/Top%20Frame%20Sides%20with%20pic.png" alt="">
        </div>
        <div  style="height:100%;color: #512813" class="col-xs-6">
            <img style="z-index:10;height: 650px;width: 105%;position: absolute;top: -175px;left: 0" src="../images/Top%20Frame%20Middle.png">
            <div style="position: absolute;z-index: 25">
                <div class="row">
                    <div style="height:60px;text-align: center;padding-top: 20px;padding-left: 60px;font-family: 'Rochester', cursive" class="col-xs-12">
                        <h1 style="font-size: 50px; color:#6B006B">Divine Decluttering</h1>
                    </div>
                </div>
                <div class="row" style="padding-top: 45px;padding-left: 60px">
                    <div style="height:60px;font-size: 35px; color:#6B006B;" class="col-xs-12 col-xs-12" id="quotes">
                        <div>
                            Powerful
                        </div>
                        <div>
                            Sexy
                        </div>
                        <div>
                            Inspiring
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;padding-left: 40px">
                    <div style="height:175px;text-align: center;padding-left: 20px" class="col-xs-12">
                        <p style="font-size: 15px;padding-left: 10px;padding-right: 10px">
                            Aimee helps women make their dreams come true and live extraordinary lives as they learn how to submit
                            to their most beautiful feminine power to be able to gracefully and easily let go of the clutter from
                            their inner and outer spaces and express all of who they are.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:100%;text-align:center;padding-left: 45px" class="col-xs-3">
            <img style="height: 525px;width: 100%;position: absolute;top: -110px;left: 31px" src="../images/Top%20Frame%20Sides.png" alt="">
            <div style="height: inherit;width: 95%;position:absolute ;z-index: 25;padding-top: 60px;right: -25px">
                <span style="font-size: 22px">Sign up for your very own Divine Decluttering Newsletter and Special Offers!</span>
                <br />
                <form method="post" action="../views/newsletter.php">
                    <label for="nmail">E-mail : </label>
                    <br />
                    <input type="text" name="nmail" id="nmail" />
                    <br />
                    <br />
                    <input type="submit" name="submit" value="Sign-up" class="submit-button" />
                </form>
            </div>
        </div>
    </div>
    <div class="row row-centered" style="margin-top: 425px">
        <div class="col-xs-9 col-centered" id="slideshow" style="font-size: 34px; margin-bottom:10px; font-family: 'Rochester', cursive; margin-top:25px; margin-left:30px;">
            <div>
                &ldquo;<i>You will see your possessions in a whole new way from what you learn.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>The more love you fill yourself up with the more you can give and the more you will receive, so clear out your inner clutter to make room for this.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>Put on something that makes you feel  beautiful to prepare for some sexy sorting! </i>&rdquo;
            </div>
            <div>
                &ldquo;<i>Believe in the magic that you can create.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>Clear out your clutter to clear the way for your soul mate to come to you.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>Create your personal space to be a reflection of your inner beauty.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>As you create space without, so you create space within.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>Recreate your home and your life one step at a time.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>Surround yourself with all you love.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>As something new moves in, so should something old move out.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>Someone is waiting to receive what you no longer need, so let it go to charity.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>What you believe is what you shall receive.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>Your best life is waiting for you at the end of your comfort zone.</i>&rdquo;
            </div>
            <div>
                &ldquo;<i>Dance with your life partner... take one step and the Universe will take the next step in response to yours, then keep dancing.</i>&rdquo;
            </div>
        </div>
    </div>
    <div>
        <ul id="menu_wrap" class="Vista_Black">
            <li class="button"><a href="../">Home</a></li>
            <li class="button"><a href="clutter.html">The Clutter</a></li>
            <li class="button"><a href="discovery.php">Discovery Session</a></li>
            <li class="button"><a href="services.html">Services</a></li>
            <li class="button"><a href="bio.html">Bio</a></li>
            <li class="button"><a href="tribute.html">Tribute</a></li>
            <li class="button"><a href="contact.php">Contact</a></li>
        </ul>
    </div>

    <div style="margin-top: 50px" class="row">
        <div id="content" style="background-color: #ffffff;height: 1400px;-webkit-box-shadow: 0px 0px 29px 1px rgba(0,0,0,0.75);
                        -moz-box-shadow: 0px 0px 29px 1px rgba(0,0,0,0.75);
                        box-shadow: 0px 0px 29px 1px rgba(0,0,0,0.75);">
            <div style="height: 550px;padding-top: 50px;text-align: center" class="col-xs-12">
                <h1 style="font-family: 'Rochester', cursive; font-size:50px;">Contact Aimee</h1>
                <br />
                <img src="../images/shutterstock_1568150.jpg" width="250" height="300">
            </div>
            <div class="col-xs-12">
                <div id="contact-area">
            <br />
            <br />
                    <form method="post" action="contact.php">
                        <label for="Name">Name:</label>
                        <br />
                        <input required type="text" name="Name" id="Name" />
                        <br />
                        <label for="Email">Email:</label>
                        <br />
                        <input required type="text" name="Email" id="Email" />
                        <br />
                        <label for="Message">Message:</label><br />
                        <br />
                        <textarea name="Message" rows="20" cols="20" id="Message"></textarea>
                        <br />
                        <input type="submit" name="submit" value="Submit" class="submit-button" />
                        <br />
                        <div class="g-recaptcha" data-sitekey="6Le35v0SAAAAAH1BqPUjKNnw2KjQ8GZzzk-wFNXa" align="center"></div>
                        <br />
                        <br />

                    </form>
                    <span class='msg'><?php echo $msg; ?></span>
                </div>
            </div>
            <div style="height: 200px;padding: 15px;text-align: center" class="col-xs-12">
                <h2 style="font-family: 'Rochester', cursive">You can also contact Aimee directly at: </h2>
                <br>
                <h3>info@divinedecluttering.ca</h3>
            </div>
        </div>
    </div>
            <div style="padding-top:50px; height:100px; color:white; text-align:center;">
                <p style="font-size: 14px;">
                    Copyright &copy 2014 Divine Decluttering
                    <br />
                    All Rights Reserved
                </p>
            </div>
</div>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
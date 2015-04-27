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
            $why1 = Trim(stripslashes($_POST['why1']));
            $why2 = Trim(stripslashes($_POST['why2']));
            $why3 = Trim(stripslashes($_POST['why3']));
            $why6 = Trim(stripslashes($_POST['why6']));
            $why7 = Trim(stripslashes($_POST['why7']));
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
            $Body .= "Why are you thinking about decluttering now? \n";
            $Body .= $why1;
            $Body .= "\n";
            $Body .= "How does your home make you feel? \n";
            $Body .= $why2;
            $Body .= "\n";
            $Body .= "What do you feel is the one area of clutter you are struggling with the most and why? \n";
            $Body .= $why3;
            $Body .= "\n";
            $Body .= "Do you feel beautifully feminine and if not, why? \n";
            $Body .= $why6;
            $Body .= "\n";
            $Body .= "What do you feel you need to make your desires and dreams become your reality? \n";
            $Body .= $why7;
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
                        <h1 style="font-size: 50px; color:#6B006B;">Divine Decluttering</h1>
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
        <div id="content" style="height: 3000px;-webkit-box-shadow: 0px 0px 29px 1px rgba(0,0,0,0.75);
                        -moz-box-shadow: 0px 0px 29px 1px rgba(0,0,0,0.75);
                        box-shadow: 0px 0px 29px 1px rgba(0,0,0,0.75);">
            <div style="text-align:center; font-size:15px" class="col-xs-12">
                <h3 style="font-size: 40px; font-family: 'Rochester', cursive">Complementary Divine Decluttering Discovery Consultation Call</h3>
                <br />
                <br />
		<img src="../images/phone.jpg" alt="" height="200" width="300">
		<br />
		<br />
		<br />
                <p style="font-size: 18px">
                    <b>
                        Are you ready to CLEAR the clutter from your life inside and out and LOVE the space you live in because
                        of how SUPPORTIVE it feels, being a TRUE REFLECTION of who you are?  Are ready to LIVE each day through
                        the energy of your most beautiful, feminine, powerful inner QUEEN as you declutter and create the LIFE
                        OF YOUR DREAMS?
                    </b>
                </p>
                <br />
                <p style="font-size: 35px; font-family: 'Rochester', cursive">
                        Why is it so important and what does it mean to &ldquo;be in your most feminine Queen power&rdquo; <br />as you
                        sort through you clutter and make space for what you desire?
                </p>
                <hr class="style-seven">
                <ul>

                    <li><b>To be in your most feminine Queen power allows you to connect with a part of yourself that often get lost in a woman as they are out in the working world and/or taking care of their family, as connection to the masculine energy is required to be in charge and get things done.  It may be this lack of connection to your femininity that is causing frustration and sadness in your life, thus resulting in a lack of motivation to clear your clutter.</b><br /></li>
                </ul>
                <hr class="style-seven" style="width: 75%">
                <ul>
                    <li><b>To be in your most feminine Queen power gives you the gift of being completely present with who you are.  It feels freeing, radiant, strong, beautiful and sensual.  You may find that all of a sudden you clearly know what you desire for yourself once you connect to your feminine essence.   Being in your authentic power this way will allow you to easily determine what in your life is truly clutter and what is not.  </b> </li>
                </ul>
                <hr class="style-seven" style="width: 75%">
                <ul>
                    <li><b>To be in your most feminine Queen power will raise your vibration as you declutter what is in your physical space and what is inside of you, and often in magical ways, change the circumstances in your life. </b></li>
                </ul>
                <hr class="style-seven" style="width: 75%">
                <ul>
                    <li><b>To be in your most feminine Queen power is about treating yourself with the highest level of self respect and taking the most exquisite care of yourself.  Keeping your personal space free from clutter, well organized and decorated in a way that feels meaningful and beautiful to you is part of self-respect and self care. </b> </li>
                </ul>
                <hr class="style-seven">
                <p style="font-size: 18px">
                    <b>
                        This is a unique 30 minute phone consultation that will reveal your biggest source of clutter and the reason
                        for this, and have you start your connection to your inner Queen so that you are ready to conquer your
                        clutter in a powerful, feminine, inspiring, fun and easy way.  I know you want so much of a better life
                        for yourself, and getting your clutter out of the way in your most feminine essence is an extremely effective
                        and very often magical way to start making all your dreams come true.
                    </b>
                </p>
                <h2 style="font-size: 35px; font-family: 'Rochester', cursive">Is this really for me?</h2>
                <hr class="style-eight">
                <h3 style="font-size: 35px; font-family: 'Rochester', cursive">You will know if this consultation is for you if : </h3>
                <ul class="center">
                    <li>You are open to receiving support and looking at your life and what you need to do in order to fulfill your desires and dreams in a different way.</li>
                    <li>You are fully committed to start living in your most authentic feminine power and use this as your source of creative power in order to clear the clutter from your life. </li>
                    <li>You are ready to take decluttering action in your physical space.</li>
                    <li>You are prepared to start to clear the non-physical clutter in your life. </li>
                    <li>You understand that everything is energy and are ready to accept the wonderful shifts that will start to happen in your life as you connect to your inner Queen power to remove the clutter.       </li>
                    <li>What is offered  through Divine Decluttering resonates with you ( your inner voice is saying "YES"),  and you want to make sure that the services provided are the best fit for you before deciding to book a time to get started.</li>
                </ul>
                <hr class="style-eight">
                <br />
                <h4><b>
                    To schedule your complementary 30 minute Divine Decluttering Discovery Consultation phone call please
                    fill in the form below</b> 
		</h4>
		<h4>
            <b>
		    and I will be in touch with you shortly to schedule your session.</b>
                </h4><div class="row row-centered">
                    <div class="col-xs-5 col-centered" id="contact-area" style="font-size: 15px">
                        <form method="post" action="discovery.php">
                            <label for="Name">Name:</label>
                            <br />
                            <input required type="text" name="Name" id="Name" />
                            <br />
                            <label for="Email">Email:</label>
                            <br />
                            <input required type="text" name="Email" id="Email" />

                            <label for="why1">Why are you thinking about decluttering now?</label><br />
                            <textarea name="why1" rows="20" cols="20" id="why1"></textarea>

                            <label for="why2">How does your home make you feel?</label><br />
                            <textarea name="why2" rows="20" cols="20" id="why2"></textarea>

                            <label for="why3">What do you feel is the one area of clutter you are struggling with the most and why?</label><br />
                            <textarea name="why3" rows="20" cols="20" id="why3"></textarea>

                            <label for="why5">What is in your way or challenges that are not allowing you to have what you want?</label><br />
                            <textarea name="why5" rows="20" cols="20" id="why5"></textarea>

                            <label for="why6">Do you feel beautifully feminine and if not, why?</label><br />
                            <textarea name="why6" rows="20" cols="20" id="why6"></textarea>

                            <label for="why7">What do you feel you need to make your desires and dreams become your reality?</label><br />
                            <textarea name="why7" rows="20" cols="20" id="why7"></textarea>
                            <br />

                            <input type="submit" name="submit" value="Submit" class="submit-button" />
                            <div class="g-recaptcha" data-sitekey="6Le35v0SAAAAAH1BqPUjKNnw2KjQ8GZzzk-wFNXa" align="center"></div>
                            <br />
                            <br />
                            <span class='msg'><?php echo $msg;?></span>
                        </form>
                            <br />
                            <br />
                            <br />
                            <br />
                    </div>
                </div>
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
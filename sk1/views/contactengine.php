<?php
/**
 * Created by PhpStorm.
 * User: Stan
 * Date: 5/20/14
 * Time: 12:25 PM
 */


// redirect to success page
if ($success){
    print "<meta http-equiv=\"refresh\" content=\"0;URL=contact.php\">";
}
else{
    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
<?php

session_start();

ini_set("display_errors", 0);



include_once "config.php";


	if(isset($_POST["user_name"])){

			$sql_login = "select * from userinfo where username like '" . $_POST["user_name"]."' and password like '".$_POST["user_password"]."'";

			$result      = mysqli_query($con, $sql_login);
			$rows_info      = mysqli_fetch_array($result);
			if (isset($rows_info["username"])){
				$_SESSION["USER_NAME"] = $rows_info["username"];
				$_SESSION["USER_ID"] = $rows_info["ID"];
                                setcookie("USER_ID", $rows_info["ID"], time()+24*3600);
                                setcookie("USER_NAME", $rows_info["USERNAME"], time()+24*3600);
                                setcookie("USER_PASSWORD", $rows_info["PASSWORD"], time()+24*3600);
				header("Location: home.php");
				die();
			}else{
				$error_msg = "Invalid user or password!";
			}
	}
?>
<script>
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
    var username = getCookie("USER_NAME");
    if (username != "") {
        var userpassword = getCookie("USER_PASSWORD");
        alert("Welcome again:" + username + " userpassword:" + userpassword);
        window.location = "home.php";

    } else {

    }


</script>
<!DOCTYPE html>
<html class="yui3-js-enabled" lang="en_us"><head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Login</title>



</head><body onmouseout="closeMenus();">


    <iframe id="ajaxUI-history-iframe" src="css/login_css/index_002.gif" title="empty" style="display:none"></iframe>
    <input id="ajaxUI-history-field" type="hidden">


<!-- Start of page content -->
<link rel="stylesheet" type="text/css" media="all" href="css/login_css/login.css">
<!-- Start login container -->
<div class="container">
    <div id="loginform">
    <form class="form-signin" role="form" action="login.php" method="post" name="form_login" id="form_login" >

                    <span id="post_error" class="error"><?php echo $error_msg; ?></span>
                <input name="module" value="Users" type="hidden">

                <br>
                <br>
        <br>
        <div>
            <span></span>
            <input required="" autofocus="" tabindex="1" id="user_name" name="user_name" value="" type="text">
        </div>
        <br>
        <div>
            <input  required="" tabindex="2" id="user_password" name="user_password" value="" type="password">
        </div>
        <br>
        <input id="bigbutton" class="btn btn-lg btn-primary btn-block" title="Log In" tabindex="3" name="Login" value="Log In" type="submit">

    </form>

    </div>
</div>

</body></html>

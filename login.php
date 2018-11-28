<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/login.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <title></title>
    </head>
    <body>
        <div class="form">

            <div id="login">   
                <h1>Welcome Back!</h1>

                <form action="doLogin.php" method="post">

                    <div class="field-wrap">
                        <label>
                          <!--  Username<span class="req">*</span> -->
                        </label>
                        <input name="username" type="text"required autocomplete="off" placeholder="Username"/>
                    </div>

                    <div class="field-wrap">
                        <label>
                           <!-- Password<span class="req">*</span> -->
                        </label>
                        <input name="password" type="password"required autocomplete="off" placeholder="Password"/>
                    </div>

                    <p class="forgot"><a href="#">Forgot Password?</a></p>

                    <button class="button button-block"/>Log In</button>

                </form>
            </div> <!-- /form -->
    </body>
</html>

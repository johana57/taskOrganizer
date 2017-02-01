<?php
    session_start();
    if(isset($_SESSION['user_session'])!=""){
	header("Location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html   class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Iniciar Sesión</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/task.css" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />
    <!-- Javascripts -->
    <script src="assets/javascripts/jquery-1.11.3-jquery.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/angular.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/javascripts/validation.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/task.js" type="text/javascript"></script>
    <script src="assets/javascripts/login.js" type="text/javascript"></script>

    <script src="assets/javascripts/controllers/controller.js" type="text/javascript"></script>
    <script src="assets/javascripts/models/dataModel.js" type="text/javascript"></script>

  </head>
  
<body class='login'>
    <div class='wrapper'>
        <div class='row'><!--Logo y nombre -->
            <div class='col-lg-12'>
                <div class='brand text-center'>
                    <h1>
                      <div class='logo-icon'>
                        <img src="assets/images/list.png" class="img-responsive"/>
                      </div>
                        Task Organizer
                    </h1>
                </div>
            </div>
        </div><!--Logo y nombre -->
        <div class='row'><!--Cuerpo Login -->
            <div class='col-lg-12'>
                <form method="post" id="login-form">
                    <fieldset class='text-center'>
                        <legend>Iniciar Sesión</legend>
                        <div id="error"> </div><!-- error will be shown here ! -->
                        <div class='form-group'>
                            <input  type='text' class='form-control' placeholder='Usuario' name='user' id='user'/>
                        </div>
                        <div class='form-group'>
                          <input type='password' class='form-control' placeholder='Contraseña' name='password' id='password'/>
                        </div>
                        <div class='text-center'>
                            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Entrar
                            </button>
                            <br>
                            <a href="forgot_password.php">¿Olvidaste tu contraseña?</a>
                        </div>
                    </fieldset>
                </form>
            </div>
      </div><!--Cuerpo Login -->
    </div>
    <!-- Footer -->
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>

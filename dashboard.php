<?php
    session_start();
    if(!isset($_SESSION['user_session'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html class='no-js' lang='en' ng-app="taskOrganizer" ng-controller="listas">
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Task Organizer</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/task.css" rel="stylesheet" type="text/css" /><link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />
  </head>
  
  <body class='main page'>
    <div class='navbar navbar-default' id='navbar'><!-- Navbar -->
        <a class='navbar-brand' href='dashboard.php'>
            Task Organizer <img src="assets/images/list.png" style="max-width: 7%"/>
        </a>
        <ul class='nav navbar-nav pull-right'>
            <li class='dropdown user'>
              <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                <i class='icon-user'></i>
                <strong><?php echo $_SESSION['user_session']; ?></strong>
                <img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
                <b class='caret'></b>
              </a>
              <ul class='dropdown-menu'>
                <li>
                    <a href="logout.php">Cerrar sesión</a>
                </li>
              </ul>
            </li>
        </ul>
    </div><!-- Navbar -->
    <div id='wrapper'>
        <section id='sidebar'><!-- Sidebar -->
            <i class='icon-align-justify icon-large' id='toggle'></i>
            <ul id='dock'>
              <li class='active launcher'>
                <i class='icon-home'></i>
                <a href="dashboard.php">Inicio</a>
              </li>
              <li class='launcher'>
                <i class='icon-file-text-alt'></i>
                <a href="forms.php">Tareas</a>
              </li>
            </ul>
      </section><!-- Sidebar -->
      <section id='tools'><!-- Tools -->
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Inicio</li>
        </ul>
      </section><!-- Tools -->
      <div id='content'><!-- Content -->
        <div class='panel panel-default'>
          <div class='panel-heading'>
            Estadística de Tareas
          </div>
          <div class='panel-body'>
            <div class='row text-center'>
              <div class='col-md-6'>
                <input class='knob second' data-bgcolor='#d4ecfd' data-fgcolor='#30a1ec' data-height='140' data-inputcolor='#333' data-thickness='.3' data-width='140' type='text' value='50'>
              </div>
              <div class='col-md-6'>
                <input class='knob second' data-bgcolor='#c4e9aa' data-fgcolor='#8ac368' data-height='140' data-inputcolor='#333' data-thickness='.3' data-width='140' type='text' value='75'>
              </div>
            </div>
          </div>
        </div>
      </div><!-- Content -->
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="assets/javascripts/task.js" type="text/javascript"></script>
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>

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
    <title>New Task</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/task.css" rel="stylesheet" type="text/css" /><link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />
    
    <!-- Javascripts -->
    <script src="assets/javascripts/jquery-1.11.3-jquery.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/angular.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/ng-table.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/javascripts/validation.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/task.js" type="text/javascript"></script>
    
    <script src="assets/javascripts/controllers/controller.js" type="text/javascript"></script>
  </head>
 
  <body class='main page'>
    <div class='navbar navbar-default' id='navbar'> <!-- Navbar -->
       <a class='navbar-brand' href='dashboard.php'>
         <i class='icon-beer'></i>
         Task Organizer
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
     </div> <!-- Navbar -->
    <div id='wrapper'>
      <section id='sidebar'><!-- Sidebar -->
        <i class='icon-align-justify icon-large' id='toggle'></i>
        <ul id='dock'>
          <li class='launcher'>
            <i class='icon-home'></i>
            <a href="dashboard.php">Inicio</a>
          </li>
          <li class='active launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="forms.php">Tareas</a>
          </li>
        </ul>
      </section><!-- Sidebar -->
      <section id='tools'><!-- Tools -->
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Tareas</li>
          <li class='active'><a href="#">Crear Nueva Tarea</a></li>
        </ul>
      </section><!-- Tools -->
      <div id='content'><!-- Content -->
        <div class='panel panel-default'>
            <div class='panel-body'>
                <form ng-submit="addTask()" class='form-horizontal'><!-- Form create new task-->
                    <fieldset>
                        <legend><i class='icon-edit icon-large'></i>Crear Nueva Tarea</legend>
                        <div class='form-group'>
                          <div class='col-lg-10'>
                            <input class='form-control' required ng-model="description" placeholder='Ingrese el nombre de la nueva tarea' type='text'>
                          </div>
                            <button class='btn btn-default' type='submit'>Guardar</button>
                            <a class='btn' href='dashboard.php'>Cancelar</a>
                        </div>
                    </fieldset>
                </form><!-- Form create new task-->
            </div>
        </div>
        <div class='panel panel-default grid'><!-- Listas -->
            <div class='row'>
                <div class='col-md-6'>
                <style type="text/css">
                  .table td {
                    text-align: center;
                  }
                  .back {
                    cursor: pointer;
                  }
                </style>
                <table ng-table="pendientes" class="table table-striped">
                         <tr ng-repeat="task in $data">
                             <td data-title="'Id'">
                                 {{ $index+1 }}
                             </td>
                             <td  data-title="'Descripción'"  class="back" sortable="'description'" >
                                 {{ task.description }}
                             </td>
                             <td data-title="'Acciones'" >
                              <a class='btn btn-success' data-toggle='tooltip' ng-click="transferTo($index, tasks, completed)" href='#' title='Hecho'>
                                <i class='glyphicon glyphicon-ok'></i>
                              </a>
                              <a class='btn btn-danger' href='#' ng-click="deleteTask($index, tasks)">
                                <i class='icon-trash'></i>
                              </a>
                             </td>
                        </tr>
                </table>
              </div>
                <div class='col-md-6'>
                 <table ng-table="realizadas" class="table table-striped">
                     <tr ng-repeat="task in $data">
                             <td data-title="'Id'">
                                 {{ $index+1 }}
                             </td>
                             <td data-title="'Descripción'" sortable="'description'">
                                 {{ task.description }}
                             </td>
                             <td data-title="'Acciones'" >
                                <a class='btn btn-success' data-toggle='tooltip' ng-click="transferTo($index, completed, tasks)" href='#' title='Hecho'>
                                    <i class='glyphicon glyphicon-chevron-left'></i>
                                </a>
                              <a class='btn btn-danger' href='#'  ng-click="deleteTask($index, completed)">
                                <i class='icon-trash'></i>
                              </a>
                             </td>
                        </tr>
                        </tr>
                </table>
               </div>
            </div>
        </div> <!-- Listas -->
      </div><!-- Content -->
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>

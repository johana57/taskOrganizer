<?php
    session_start();
    if(!isset($_SESSION['user_session'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html class='no-js' ng-app="taskOrganizer" ng-controller="listas" lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Tables</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" /><link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/stylesheets/ng-table.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />

    <!-- Javascripts -->
    <script src="assets/javascripts/jquery-1.11.3-jquery.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/angular.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/ng-table.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/javascripts/validation.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    
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
            <i class='icon-dashboard'></i>
            <a href="dashboard.php">Inicio</a>
          </li>
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="forms.php">Tareas</a>
          </li>
          <li class='active launcher'>
            <i class='icon-table'></i>
            <a href="tables.php">Ver tareas</a>
          </li>
        </ul>
      </section><!-- Sidebar -->
      <section id='tools'><!-- Tools -->
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Ver tareas</li>
        </ul>
      </section><!-- Tools -->
      <div id='content'><!-- Content -->
        <div class='panel panel-default grid'>
          <div class='panel-heading'>
            <i class='icon-table icon-large'></i>
            Default Table
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-wrench'></i>
                  Settings
                </a>
                <a class='btn' href='#'>
                  <i class='icon-filter'></i>
                  Filters
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Reload'>
                  <i class='icon-refresh'></i>
                </a>
              </div>
              <div class='badge'>3 record</div>
            </div>
          </div>
          <div class='panel-body filters'>
            <!--<div class='row'>
              <div class='col-md-9'>
                Add your custom filters here...
              </div>
              <div class='col-md-3'>
                <div class='input-group'>
                  <input class='form-control' placeholder='Quick search...' type='text'>
                  <span class='input-group-btn'>
                    <button class='btn' type='button'>
                      <i class='icon-search'></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
          -->
          </div>
          <div class='row'>
              <div class='col-md-6'>
                <style type="text/css">
                  .table td {
                    text-align: center;
                  }
                </style>
                <table ng-table="pendientes" class="table table-striped">
                         <tr ng-repeat="p in $data" ng-if="p.status==0 && p.deleted==0">
                             <td data-title="'Id'" sortable="'name'" >
                                 {{ $index+1 }}
                             </td>
                             <td data-title="'Descripción'" sortable="'descripcion'" >
                                 {{ p.descripcion }}
                             </td>
                             <td data-title="'Estatus'" >
                                 {{ validStatus(r.status) }}
                             </td>
                             <td data-title="'Acciones'" >
                              <a class='btn btn-success' data-toggle='tooltip' ng-click="doTask(p)" href='#' title='Hecho'>
                                <i class='icon-zoom-in'></i>
                              </a>
                              <a class='btn btn-danger' href='#' ng-click="deleteTask(p)">
                                <i class='icon-trash'></i>
                              </a>
                             </td>
                        </tr>
                </table>
              </div>

               <div class='col-md-6'>
                 <table ng-table="realizadas" class="table table-striped">
                             <tr ng-repeat="r in $data" ng-if="r.status==1 && r.deleted==0">
                             <td data-title="'Id'" sortable="'name'" >
                                 {{ $index+1 }}
                             </td>
                             <td data-title="'Descripción'" sortable="'descripcion'" >
                                 {{ r.descripcion }}
                             </td>
                             <td data-title="'Estatus'" >
                                 {{ validStatus(r.status) }}
                             </td>
                             <td data-title="'Acciones'" >
                              <a class='btn btn-danger' href='#' ng-click="deleteTask(r)">
                                <i class='icon-trash'></i>
                              </a>
                             </td>
                        </tr>
                        </tr>
                </table>
               </div>
            </div>

          <!--<table class='table'>
            <thead>
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th class='actions'>
                  Actions
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class='success'>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <tr class='danger'>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <tr class='warning'>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <tr class='active'>
                <td>4</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <tr class='disabled'>
                <td>5</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>7</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>8</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>10</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td class='action'>
                  <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
                    <i class='icon-zoom-in'></i>
                  </a>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
          <div class='panel-footer'>
            <ul class='pagination pagination-sm'>
              <li>
                <a href='#'>«</a>
              </li>
              <li class='active'>
                <a href='#'>1</a>
              </li>
              <li>
                <a href='#'>2</a>
              </li>
              <li>
                <a href='#'>3</a>
              </li>
              <li>
                <a href='#'>4</a>
              </li>
              <li>
                <a href='#'>5</a>
              </li>
              <li>
                <a href='#'>6</a>
              </li>
              <li>
                <a href='#'>7</a>
              </li>
              <li>
                <a href='#'>8</a>
              </li>
              <li>
                <a href='#'>»</a>
              </li>
            </ul>
            <div class='pull-right'>
              Showing 1 to 10 of 32 entries
            </div>
          </div>-->
        </div>
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

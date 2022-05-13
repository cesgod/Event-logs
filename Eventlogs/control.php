<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>EVENTOS | CLYFSA</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link href="../images/favicon.png" rel="icon" type="image/x-icon"/>
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="./style.css">

 
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script type="text/javascript" src="http://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
  </script>

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

</head>

<body class="bg-theme bg-theme2">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="control.php">
       <img src="../images/0logo.png" class="logo-icon" alt="logo icon" width="50%">
       <h5 class="logo-text">Dashboard</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="eventos.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Eventos</span>
        </a>
      </li>
      <!--<li>
        <a href="profile.php">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Transferir</span>
        </a>
      </li> -->
      
<!--
       <li>
        <a href="register.html" target="_blank">
          <i class="zmdi zmdi-account-circle"></i> <span>Registration</span>
        </a>
      </li>

      <li class="sidebar-header">LABELS</li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>
    -->
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    
    
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="assets/images/logo_clip.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/logo_clip.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">Admin</h6>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"><a href="index.php"></i>Salir</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">

<div class="row">




        <div class="col-lg-12">
            <div class="card-body">
              <h4 class="card-title">Dashboard de Eventos</h4> 
              <H4></H4>
                  <!--<div class="cards">-->
                    

                    <table class="table table-hover" id="Mytable" style="width:100%;">
                      <thead>
                          <th>MeterName</th>
                          <th>Date</th>
                          <th>Event</th>
                      </thead>
                      <tbody>
                        <?php
                          $json=file_get_contents("../virtualenvs/Cl/EventLogs/doc_allconn.json");
                          $data["stand"] =  json_decode($json);
                          $data = (object) $data;
                          $arrayx = json_decode(json_encode($data), true);
                          $limitx = count($arrayx["stand"]);
                          $c=0;
                         # echo "<pre>";print_r($arrayx);echo "</pre>";
                          #echo count($data)
                          #echo  
                          for ($y=0; $y<$limitx; $y++)
                          {
                            if($c==0)
                            {
                              echo "<tr>";
                            }
                             echo "<td>".$arrayx["stand"][$y]."</td>";
                             $c=$c+1;
                             if($c==3)
                             {
                               echo "</tr>";
                               $c=0;
                             }
                                
                          }  
                          #die();
                         
                      ?>
                      </tbody>
                    </table>


                 <!-- </div>-->        
                </div>
          </div>
      </div><!--End Row-->
  </div><!--End Row-->
  
    
  <!--start overlay-->
      <div class="overlay toggle-menu"></div>
    <!--end overlay-->
    
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  
  <!--Start footer-->
  <!--<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2021 Dashboard Admin
        </div>
      </div>
    </footer>-->
  <!--End footer-->
  
  <!--start color switcher-->
   <div class="right-sidebar">
   
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
    <li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->

  </div><!--End wrapper-->
  <!-- Bootstrap core JavaScript
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>-->
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>

  <!-- Custom scripts -->

  <script type="text/javascript">
          $(document).ready( function () {
          $('#Mytable').DataTable({
              "scrollX": true,
              "scrolly": true,
              dom: 'Bfrtip',
              "pageLength": 20,
              buttons: [
                {
                  extend: 'copyHtml5',
                  className: "btn btn-light",
                  orientation: 'landscape',
                  pageSize: 'LEGAL'
                },
                {
                  extend: 'excelHtml5',
                  className: "btn btn-light",
                  orientation: 'landscape',
                  pageSize: 'LEGAL'
                },
                {
                  extend: 'csvHtml5',
                  className: "btn btn-light",
                  orientation: 'landscape',
                  pageSize: 'LEGAL'
                },
                {
                  extend: 'pdfHtml5',
                  className: "btn btn-light",
                  orientation: 'landscape',
                  pageSize: 'LEGAL'
                }
              ]
            });
      } );    
  </script>
  <script src="./script.js"></script>
  <!-- Index js -->
  <!--<script src="assets/js/index.js"></script>-->
  <!--<script src="chartdata.js"> </script>-->





</body>
</html>
<script>
if(document.getElementById('ftnt_topbar_script')) {
    document.getElementById('ftnt_topbar_script').remove()
} else {
   var pluginHolder = document.createElement('div');
   document.body.appendChild(pluginHolder);
}
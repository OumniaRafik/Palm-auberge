<?php
session_start();
require 'db.php';
$sql = 'SELECT * FROM reservation';
$statement = $connection->prepare($sql);
$statement->execute();
$reservation = $statement->fetchAll(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, ample admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, material design, material dashboard bootstrap 4 dashboard template">
    <meta name="description" content="Ample Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
      <title>Gestion reservations</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
    .btn-primary{
        background-color: #5a6268;
    }
    .btn-primary:hover {
        background-color: #4a4a47;
    }
</style>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="dashboard.php">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <!--This is dark logo icon-->
                            <img src="plugins/images/palm-logo.png" alt="home" class="dark-logo" />
                            <!--This is light logo icon-->
                            <img src="plugins/images/palm-logo.png" alt="home" class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                            <!--This is dark logo text-->
                            <img src="plugins/images/palm.png" alt="home" class="dark-logo" />
                            <!--This is light logo text-->
                            <img src="plugins/images/palm.png" alt="home" class="light-logo" />
                        </span> 
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <b class="hidden-xs">
                            
                            <?php 
                                 if(isset($_SESSION["username"]))
                                {
                                    echo "Salut, " .$_SESSION["prenom"] ." " .$_SESSION["nom"] ;
                                }
                            ?> 
                        </b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="dashboard.php" class="waves-effect "><i class="fa fa-users fa-fw" aria-hidden="true"></i>Gestion Utilisateurs</a>
                    </li>
                    <li>
                        <a href="gestionMessage.php" class="waves-effect "><i class="fa fa-envelope fa-fw" aria-hidden="true"></i>Gestion Messages</a>
                    </li>
                    <li>
                        <a href="gestionReservation.php" class="waves-effect active"><i class="fa fa-building fa-fw" aria-hidden="true"></i>Gestion Réservations </a>
                    </li>
                    <li>
                        <a href="index.php" class="waves-effect"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i>Retour à la page d'acceuil</a>
                    </li>

                    <li>
                        <a href="logout.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Se Déconnecter</a>
                    </li>
                    

                </ul>
               
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Gestion Réservations</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            
                            
                            <div class="table-responsive">
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th>Date début</th>
                                            <th>Date fin</th>
                                            <th>Nombre d'adults</th>
                                            <th>Nombre d'enfant</th>
                                            <th>Chambre</th>
                                            <th>Plats</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach($reservation as $reservation): ?>
                                        <tr>
                                             <td><?= $reservation->Date_debut; ?></td>
                                             <td><?= $reservation->Date_fin; ?></td>
                                             <td><?= $reservation->nb_adult; ?></td>
                                             <td><?= $reservation->nb_enf; ?></td>
                                             <td><?= $reservation->chambre; ?></td>
                                             <td><?= $reservation->plats; ?></td>
                                             <td>
                                             
                                             <a onclick="return confirm('vous etes sure que vous voulez Supprimer ce message?')" href="deleteReservation.php?id=<?= $reservation->id_res ?>" class='btn btn-danger'>Supprimer</a>
                                            
                                             </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            
                            
                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
                
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> © 2020 PALM AUBERGE by <b>SOUKAINA EL HORRE</b> </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/js/custom.min.js"></script>
    <script src="js/js/dashboard1.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
</body>

</html>

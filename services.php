<?php 
    session_start();
    $message = "";
    try {
        $conn = new PDO('mysql:host=localhost;dbname=hassna', 'root', '');
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST["login"])) 
            {
                if (empty($_POST["username"]) || empty($_POST["password"])) 
                {
                     header("location:login_failed.php");
                }
                else
                {
                    $query = "SELECT * FROM hassna WHERE username = :username AND password = :password";
                    $statement = $conn -> prepare($query);
                    $statement -> execute(
                        array(
                            'username' => $_POST["username"],
                            'password' => $_POST["password"]
                             )
                                      );
                    $count = $statement -> rowCount();
                    if ($count > 0) 
                    {
                        $_SESSION['username'] = $_POST['username'];
                        header("location:login_success.php");
                    }
                    else
                    {
                        header("location:incorrect.php");
                    }
                }
            }
        }
    catch(PDOException $error)
        {
            $message = $error -> getmessage();
        } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">PalmAuberge</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Acceuil</a></li>
          <li class="nav-item"><a href="rooms.php" class="nav-link">Chambres</a></li>
          <li class="nav-item active"><a href="services.php" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
           <li class="nav-item"><a href="reservation.php" class="nav-link">Réservation</a></li>
          <?php 
          if(empty($_SESSION['username']))
          {
           echo "<li class='nav-item'>
            <a href='#' class='nav-link' data-toggle='modal' data-target='#MonModal'>Se connecter</a>
          </li>"; 
          }
          
          ?>

          <?php
          if(isset($_SESSION['username']))
          {
           echo "<li class='nav-item'>
            <a href='logout.php' class='nav-link'>Se déconnecter</a>
          </li>"; 
          }

          ?>
          <?php 
           if(isset($_SESSION['admin']))
          {
           echo "<li class='nav-item'>
            <a href='dashboard.php' class='nav-link'>Espace ADMIN</a>
          </li>"; 
          }
          ?>
         
        </ul>
      </div>
    </div>
  </nav>
  <div class="modal" data-wow-delay=".3s" id="MonModal" role="dialog">
       <div class="modal-dialog ">
           <div class="modal-content">
             <div class="limiter">
                  <div class="wrap-login100">
                    <form class="login100-form validate-form" method="POST">
                      <span class="login100-form-title p-b-26">
                        Se connecter
                      </span>
                      <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                      </span>

                      <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                        <input class="input100" type="text" name="username" placeholder="Email">
                        <span class="focus-input100" ></span>
                      </div>

                      <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                          <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" ></span>
                      </div>

                      <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                          <div class="login100-form-bgbtn"></div>
                          <button class="login100-form-btn" name="login">
                            Login
                          </button>
                        </div>
                      </div>

                      <div class="text-center p-t-115">
                        <span class="txt1">
                          Don’t have an account?
                        </span>

                        <a class="txt2" href="inscription.php">
                          Sign Up
                        </a>
                      </div>
                    </form>
                  </div>
              </div>                        
           </div>
       </div>
   </div>
  <!-- END nav -->
  
  

  <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm">Services</span>
              <h2 class="heading">Installations et services</h2>
        </div>
      </div>
    </div>
  </div>


  <div class="container">

  	<div class="row site-section">
  		<div class="col-lg-7 mb-5">
  			<img src="images/img_7.jpg"  alt="Image placeholder" class="img-fluid img-shadow" >
  		</div>
  		<div class="col-lg-5 pl-md-5">
  			
  			<div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
            <div class="media-body">
              <h3 class="heading">Chambres de luxe</h3>
              <p>Des chambres de luxe ou triple superieur qui disposent d'une cheminée avec un coin salon et une barbecue.</p>
            </div>
	      </div>     

	      <div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Wifi gratuit</h3>
            <p>Une connexion WI-FI est disponible dans l'ensemble de l'auberge, Chambres et parties communes.</p>
          </div>
	      </div>   

	      <div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Réception</h3>
            <p>Pour votre confort, la réception est ouverte 24h/24.</p>
          </div>
	      </div>   
  		</div>
  	</div>


  	<div class="row site-section pt-0">
  		<div class="col-lg-7 mb-5 order-lg-2">
  			<img src="images/img_2.jpg" alt="Image placeholder" class="img-fluid img-shadow">
  		</div>
  		<div class="col-lg-5 pr-md-5 order-lg-1">
  			<div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
            <div class="media-body">
              <h3 class="heading">Parking</h3>
              <p>Un parking gratuit est diponible sur place.</p>
            </div>
	      </div>     

	      <div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
            <div class="media-body">
              <h3 class="heading">Accepte la carte de crédit</h3>
              <p>En ce qui conserne la money, nous acceptons tous types de paiment soit espèces ou bien carte bancaire.</p>
            </div>
	      </div>   

	      <div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
            <div class="media-body">
              <h3 class="heading">Restaurant</h3>
              <p>Nous proposons un menu touristique pour découvrir les saveurs marocaines.</p>
            </div>
	      </div>   
  		</div>
  	</div>
  </div>

  <div class="bg-light site-section">
  	<div class="container">
  		<div class="row mb-5">
          <div class="col-md-7 section-heading">
            <span class="subheading-sm">SERVICES</span>
            <h2 class="heading">Installations & services</h2>   
          </div>
      </div>
  		<div class="row ">
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-double-bed"></span></div>
              <div class="media-body">
                <h3 class="heading">Chambres</h3>
                <p>Même le tout-puissant Pointing n’a aucun contrôle sur les textes aveugles, c’est presque un non orthographique.</p>
              </div>
          </div>      
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-wifi"></span></div>
              <div class="media-body">
                <h3 class="heading">Wifi gratuits</h3>
                <p>Une connexion WI-FI est disponible dans l'ensemble de l'hotel, Chambres et parties communes.</p>
              </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-customer-service"></span></div>
              <div class="media-body">
                <h3 class="heading">Réception</h3>
                <p>Pour votre confort, la réception est ouverte 24h/24..</p>
              </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-taxi"></span></div>
              <div class="media-body">
                <h3 class="heading">Parking</h3>
                <p>Un parking gratuit est diponible sur place.</p>
              </div>
          </div>      
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-credit-card"></span></div>
              <div class="media-body">
                <h3 class="heading">Accepte la carte de crédit</h3>
                <p>Même le tout-puissant Pointing n’a aucun contrôle sur les textes aveugles, il s’agit d’un texte presque non orthographique.</p>
              </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-dinner"></span></div>
              <div class="media-body">
                <h3 class="heading">Restaurant</h3>
                <p>Nous proposons un menu touristique pour découvrir les saveurs marocaines..</p>
              </div>
          </div>
        </div>
      </div>
  	</div>
  </div>
      
  <footer class="footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section">à propos de nous</h3>
          <p class="mb-5">Vous souhaitez passer un bon weekend en famille, vous avez l'argent et vous savez pas ou partir, Palm Auberge vous souhaite le bienvenue, nous sommes votre alliès, nous recevons chaque jour de nouveaux clients partout, alors bienvenue.</p>
          
        </div>
        &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp 
        <div class="col-md-6 col-lg-4">
          <div class="block-23">
            <h3 class="heading-section" >Contact Info</h3>
              <ul>
                <p>Oasis Hassan 2 Douar Dlam, 40000, Marrakech , Maroc</p>
                <li><span class="icon icon-map-marker"></span><span style="color: #008080;" class="text">Longitude=-7.968084 Latitude=31.590279</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span style="color: #008080;"  class="text"> +212661-324456,+212524404055</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span style="color: #008080;"  class="text">palmauberge@gmail.com</span></a></li>
                <li><span class="icon icon-clock-o"></span><span style="color: #008080;"  class="text">Monday &mdash; Friday 8:00am - 5:00pm</span></li>
              </ul>
            </div>
        </div>    
      </div>
      <div class="row pt-5">
        <div class="col-md-12 text-left">
          <p style="text-align: center;">
            Palm Auberge <script>document.write(new Date().getFullYear());</script> | All rights reserved
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
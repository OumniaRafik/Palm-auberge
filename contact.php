<?php 
require('connection.php');


    session_start();
    $message = "";
    try {
     
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
                        header("location:index.php");
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

          if (isset($_POST["envoyer"])) 
            {
                if (!empty($_POST["nom"]) AND !empty($_POST["email"]) AND !empty($_POST["sujet"]) AND !empty($_POST["message"])) 
                {
                     
                     $nom= $_POST['nom'];
                     $email= $_POST['email'];
                     $sujet= $_POST['sujet'];
                     $message= $_POST['message'];
            
                                $q =  $conn->prepare("INSERT INTO message(nom, email, sujet, message) VALUES(:nom,:email,:sujet,:message)");
                                $q->execute([
                                'nom'=>$nom,
                                'email'=>$email,
                                'sujet' => $sujet,
                                'message' => $message
                                 ]);

                          header("location:contact.php?msg=Votre message a été envoyé!");

                 }
                       
                     
                    
                
                
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
          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
          <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
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
          <span class="subheading-sm">Contact</span>
          <h2 class="heading">Entrer en contact</h2>
        </div>
      </div>
    </div>
  </div>

    
  

  <div class="site-section">

    <div class="container">

     <?php
      if(isset($_GET['msg'])) 
      {
        echo "<h2 style='color:green'>" .$_GET['msg'] ."</h2>";;
      }
      ?>
      <div class="row block-9">
        <div class="col-md-6 pr-md-5">
          <form method="POST" action="#">
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" id="nom" name="nom" placeholder="Votre Nom" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" id="email" name="email" placeholder="Votre Email" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" id="sujet" name="sujet" placeholder="sujet" required="">
            </div>
            <div class="form-group">
              <textarea  cols="30" rows="7" id="message" name="message" class="form-control px-3 py-3" placeholder="Message" required=""></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Envoyer" id="envoyer" name="envoyer" class="btn btn-primary py-3 px-5" onclick="myFunction()">
            </div>
            <h3 id="demo"></h3>
             <?php
    if (isset($message)) 
    {
      echo '<font color="Red">' .$message.'</font>';
    }
  ?>
          </form>
        
        </div>

        <div class="col-md-6" >
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13594.272047672956!2d-7.9683525!3d31.5908921!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5135ab1304aeb164!2sPalm%20Auberge!5e0!3m2!1sfr!2sma!4v1599595440050!5m2!1sfr!2sma" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
            Palm Auberge<script>document.write(new Date().getFullYear());</script> | All rights reserved
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
  <script>
function myFunction() {

  var nom = $("#nom").val();
  var email = $("#email").val();
  var sujet = $("#sujet").val();
  var message = $("#message").val();
  if (nom == "" || email == "" || sujet == "" || message == "" )
  {
    
    alert("Veuillez remplir tous les chmaps! ");
  }
  
  
};
</script>
  </body>
</html>
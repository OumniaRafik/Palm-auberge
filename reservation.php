<?php
 
 session_start();
    $mess = "";
    try {
       $conn = new PDO('mysql:host=localhost;dbname=hassna', 'root', '');
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST["reserver"])) 
            {
                if (!empty($_POST["date1"]) AND !empty($_POST["date2"])) 
                {
                     $date1 = $_POST['date1'];
                     $date2 = $_POST['date2'];
                    
                     $adult= $_POST['adult'];
                      $enfant=$_POST['enfant'];
                      $chambre=$_POST['chambre'];
                      $plats=$_POST['plats'];
                        if ($date2 > $date1) 
                        {
                          $query = $conn -> prepare("INSERT INTO reservation (Date_debut,Date_fin,nb_adult,nb_enf,chambre,plats) VALUES (?,?,?,?,?,?)");
                          $query -> execute(array($date1,$date2,$adult,$enfant,$chambre,$plats));
                          $mess = "Votre reservation a été bien ajouter !!!";
                        }
                        else 
                        {
                          $mess = "Véréfier vos dates de reservation !!!";
                        }
                }
                else
                {
                    $mess ="Tous les champs doivent etre rempli !!";
                }
            }
        }
    catch(PDOException $err)
        {
            $mess = $err -> getMessage();
        } 
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>PALM AUBERGE | Réservation</title>
 	    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
 </head>
 <body>


<br> 

<div class="container ">
	<div class="card uper col-md-10">
		  <div class="card-body">
		  
			<form action="" method="POST" >
			    
			          <div class="form-group">
			              <label for="nom">Date Entrée</label>
			              <input type="date" class="form-control" name="date1"/>
			          </div>

			          <div class="form-group">
			              <label for="prenom">Date Sortie </label>
			              <input type="date" class="form-control" name="date2"/>
			          </div>

			          <div class="form-group">
			          	<label>Adultes</label>
			               <select name="adult" id="" class="form-control">
			                  <option value="1">1</option>
			                  <option value="2">2</option>
			                  <option value="3">3</option>
			                  <option value="4">4+</option>
			                </select>
			          </div>

			           <div class="form-group">
			           	<label>Enfants</label>
			               <select name="enfant" id="" class="form-control">
			                  <option value="1">1</option>
			                  <option value="2">2</option>
			                  <option value="3">3</option>
			                  <option value="4">4+</option>
			                </select>
			          </div>


			          <div class="form-group">
			          	 <label>Choisie une chambre </label>
			            <select name="chambre" id="" class="form-control">
			              <option value="Chambres double ">Chambres double </option>
			              <option value="Chambres simple">Chambres simple</option>
			              <option value="chambre familliale">chambre familliale</option>
			            </select>
			          </div>

                <div class="form-group">
                   <label>Choisie un plats </label>
                  <select name="plats" id="" class="form-control">
                    <option value=" tajine ">Tajine </option>
                    <option value=" couscous">Couscous</option>
                    <option value=" salade">Salade</option>
                  </select>
                </div>

			          <button type="submit" class="btn btn-success" name="reserver">Valider Votre réservation</button>
			          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			        <?php
						echo '<a href="index.php" class="btn btn-info" style="background:    orange;border: none; margin: 20px auto;text-align: center;padding: 14px 40px;color: white;border-radius: 24px;outline: none;">Retour</a>';?>
			         <?php
    if (isset($mess)) 
    {
      echo '<b><center><h3 style="color:red">' .$mess.'</h3></center></b>';
    }
  ?>
			      </form>
  				</div>
			</div>
		</div>
     



 



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
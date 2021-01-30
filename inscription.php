<?php
	session_start();
    $message = "";
    try {
        $conn = new PDO('mysql:host=localhost;dbname=hassna', 'root', '');
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST["creer"])) 
            {
                if (!empty($_POST["nom"]) AND !empty($_POST["prenom"]) AND !empty($_POST["email"]) AND !empty($_POST["pass1"]) AND !empty($_POST["pass2"])) 
                {
                     $name = htmlspecialchars($_POST['email']);
                     $pass1 = $_POST['pass1'];
                     $pass1 = md5($pass1);
                     $pass2 = $_POST['pass2'];
                     $pass2 = md5($pass2);
                     $nom= $_POST['nom'];
                     $prenom= $_POST['prenom'];


                     $longeurNom = strlen($name);
                     if ($longeurNom <= 255) 
                     {
                     	if (filter_var($name,FILTER_VALIDATE_EMAIL)) 
                     	{	
	                     	if ($pass1 == $pass2) 
	                     	{
	                     		
 
                                $q =  $conn->prepare("INSERT INTO hassna(nom,prenom,username,password) VALUES(:nom,:prenom,:name,:pass1)");
                                $q->execute([
                                'nom'=>$nom,
                                'prenom'=>$prenom,
                                'name' => $name,
                                'pass1' => $pass1
                                 ]);
	                     		$message = "Votre compte a été bien creé !!!";
	                     	}
	                     	else 
	                     	{
	                     		$message = "Vos mot de passe ne se correspendent pas !!!";
	                     	}
	                    }
	                    else
	                    {
	                    	$message = "Votre adresse mail n'est pas valide !!!";
	                    }
                     }
                     else
                     {
                     	$message = "Votre nom ou email ne doit pas depasser les 255 caracteres";
                     }
                }
                else
                {
                    $message ="Tous les champs doivent etre rempli !!";
                }
            }
        }
    catch(PDOException $error)
        {
            $message = $error -> getMessage();
        } 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="inscription.css">
  
</head>
<body>
	<form method="POST" action="#" style="width: 600px;padding: 70px;position: absolute;transform: translate(60%,10%);background: #CCCCCC;text-align: center;border-radius: 30px; border: 1px solid #BA55D3;">
		<h1><strong style=" color: #3399FF;">Inscription</strong></h1>
        <br>
        <br>
        <input type="text" name="nom" placeholder="nom" class="form-control" style="background: transparent; border: none;outline: none; border-radius: 30px;" ><br>
                <input type="text" name="prenom" placeholder="prenom" class="form-control" style="background: transparent; border: none;outline: none; border-radius: 30px;" ><br>

        		<input type="email" name="email" placeholder="email" class="form-control" style="background: transparent; border: none;outline: none; border-radius: 30px;" >
              <br>
        		<input type="password" name="pass1" id="psw" placeholder="mot de passe" class="form-control" style="background: transparent;border: none;outline: none; border-radius: 30px;">  
        	 <br>	
        		<input type="password" name="pass2" id="txtConfirmPassword" placeholder=" Confirmer mot de passe" class="form-control" style="background: transparent; border: none; outline: none; border-radius: 30px;">	
                <br>
                <div class="registrationFormAlert" id="CheckPasswordMatch">
                </div>
        			<?php
						echo '<a href="index.php" class="btn btn-info" style="background:     #9900CC;border: none; margin: 20px auto;text-align: center;padding: 14px 40px;color: white;border-radius: 24px;outline: none;">Retour</a>';
     				?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        		
        		<input type="submit" name="creer" value="Enregistrer" class="bt btn-info" style="background:     #9900CC;margin: 20px auto;text-align: center;padding: 14px 40px;color: white;border-radius: 24px;outline: none;border: none;">
                <br> 
     <?php
		if (isset($message)) 
		{
			echo '<font color="Red">' .$message.'</font>';
		}
	?>
	</form>
	<script type="text/javascript">
     
      function checkPasswordMatch() {
     var password = $("#psw").val();
     var confirmPassword = $("#txtConfirmPassword").val();
     if (password != confirmPassword)
         $("#CheckPasswordMatch").html("Les mots de passe saisis ne sont pas identiques!").css("color", "red");
     else
         $("#CheckPasswordMatch").html("Les mots de passe saisis sont identiques.").css("color", "green");
 }   
  $(document).ready(function () {
    $("#txtConfirmPassword").keyup(checkPasswordMatch);
 });
 
    </script>
</body>
</html>
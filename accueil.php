<?php session_start();

if(!isset($_SESSION['prenom'])){
    header("Location: index.php"); //rediriger l’utilisateur sur la page index s'il ne s'est pas connecté.
    }
        require_once ("bdd.php");

        $bdd=connectDB(); //se connecte à la BDD
		
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Accueil</title>

    <link href="FicheFrais.css?<?php echo time();?> " rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
<link href="css/style.min.css" rel="stylesheet">
	
	
</head>
<body>
	<div class="row" style="margin-top:100px;">
		
		</div>
	<?php include("menu.php"); ?>
	
	
	
	
	
	<div class="row" style="margin-top:100px;">
		<div class="col-md-1">
		</div>
		 
		<div  class="col-md-4">
					<div style="text-align:center;">
            <div  class="jm-item second">
				<div class="jm-item-wrapper">
					<div class="jm-item-image">
						<img style="height:180px;width:270px;margin-right:5px;" src="remplir.jpg" />
							<div class="jm-item-description">
								 <h4>Remplir Fiche Frais </h4>
									<div class="jm-item-button"><a href="RemplirFicheFrais.php" >Voir</a></div>
							</div>
					</div>
					
				</div>
			</div>
		</div>
		</div>
		
		
	
	
	 
		<div class="col-md-1">
		</div>
		 
		<div  class="col-md-4">
					<div style="text-align:center;">
            <div  class="jm-item second">
				<div class="jm-item-wrapper">
					<div class="jm-item-image">
						<img style="height:180px;width:270px;margin-right:5px;" src="consulter.jpg" />
							<div class="jm-item-description">
								 <h4>Consulter Fiche Frais </h4>
									<div class="jm-item-button"><a href="ConsulterFicheFrais.php" >Voir</a></div>
							</div>
					</div>
					
				</div>
			</div>
		</div>
	
		</div>
			 
		</div>
		
		
 
		
	 
</body>
</html>
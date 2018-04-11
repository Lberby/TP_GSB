<?php session_start();
require_once("bdd.php");
?>

<?php //FORMULAIRE
	function formulaire(){ 
?>

	
			<center><p class="alert alert-danger" >Veuillez entrer votre identifiant et votre mot de passe </p></center>
		
                        <a href="RemplirFicheFrais.php"></a>
		<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
				<form action="index.php" method="post" class="formconnect"> <center>
					
					<p> <br>
					<input type="text" name = "login" autocomplete="off" placeholder="Login" required /> 
					
					</p>
					
					<p>  <br>
					<input type="password" name="mdp" placeholder="Mot de passe" required />
					</p>
				
					<p>
					<input type="reset" class = "btn btn-primary" value="Effacer"/>
					<input type="submit" class = "btn btn-primary" name = "btnok" value="Connexion" />		
					<a href="Inscription.php"><button type="button" name="inscription" value="S'inscrire" class="btn btn-outline-warning">S'inscrire</button></a>
					</p>
				</form>	
				</div></div>
			

<?php
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="FicheFrais.css?<?php echo time();?> " rel="stylesheet"> 
		
        <title>LOGIN</title>
	
		
    </head>
	<body>
	
	<h2 class="alert alert-warning"><center> Connectez-vous à GSB </center> </h2>
	
	
	<?php
	
		//check bouton connexion
	if (isset($_POST['btnok']))
	{ 
		$bdd = connectDB();
	 
		if ($bdd)
		{
			$query = $bdd->query('SELECT * FROM visiteur WHERE login = "'.$_POST['login'].'";');
			$data = $query->fetch();
			
			 
			
			if ($data['login'] == $_POST['login'] && $data['mdp'] == $_POST['mdp'])
			{
			
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['nom'] = $data['nom'];
				$_SESSION['prenom'] = $data['prenom'];
				$_SESSION['id'] = $data['id'];
				
							
			$query2 = $bdd->query('SELECT id FROM fraisforfait;');
			while ($line = $query2->fetch()){
				$_SESSION['idforfait'] = $data['id'];
				header("Location:accueil.php");
			}
		
			}
			
			else
			{
				formulaire();
				echo 'Identifiant ou mot de passe incorrect';			
			}
		}
				
		
	}
			
				else
	{ 
		formulaire();
	}
			
			?>
	
	</body>
	</html>
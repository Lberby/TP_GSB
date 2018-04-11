<?php session_start();
if(!isset($_SESSION['prenom'])){
    header("Location: index.php"); //rediriger l’utilisateur sur la page index s'il ne s'est pas connecté.
    }
        require_once ("bdd.php");

        $bdd=connectDB(); //se connecte à la BDD

		
?> 
<a href="RemplirFicheFrais.php"></a>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Consulter Fiche Frais</title>

    <link href="FicheFrais.css?<?php echo time();?> " rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>
	

	
	<?php 


				$query = $bdd->query("SELECT * FROM visiteur where id='".$_SESSION['id']."';");
			$data = $query->fetch();
			
		  $now = new DateTime("now"); 

                $format=$now -> format("mY"); 

               
				$query1 = $bdd->query("SELECT * FROM lignefraisforfait where idVisiteur='".$_SESSION['id']."' AND mois='".$format."' AND idFraisForfait='NUI';");
			$data1 = $query1->fetch();
			
		$query8 = $bdd->query("SELECT * FROM lignefraisforfait where idVisiteur='".$_SESSION['id']."' AND mois='".$format."' AND idFraisForfait='KM';");
			$data8 = $query8->fetch();
			
		$query9 = $bdd->query("SELECT * FROM lignefraisforfait where idVisiteur='".$_SESSION['id']."' AND mois='".$format."' AND idFraisForfait='REP';");
			$data9 = $query9->fetch();
			
		$query2 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=1 AND mois='".$format."';");
			$data2 = $query2->fetch();
			
		$query3 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=2 AND mois='".$format."';");
			$data3 = $query3->fetch();
		
		$query4 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=3 AND mois='".$format."';");
			$data4 = $query4->fetch();
		
		$query5 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=4 AND mois='".$format."';");
			$data5 = $query5->fetch();
		
		$query6 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=5 AND mois='".$format."';");
			$data6 = $query6->fetch();
			
		$query7 = $bdd->query("SELECT * FROM fichefrais where idVisiteur='".$_SESSION['id']."' AND mois='".$format."';");
			$data7 = $query7->fetch();

                
                
			 if(isset($_POST['Valider'])) 
	{
		
			
	  $format= $_POST['mois'];
	  
		$query1 = $bdd->query("SELECT * FROM lignefraisforfait where idVisiteur='".$_SESSION['id']."' AND mois='".$format."' AND idFraisForfait='NUI';");
			$data1 = $query1->fetch();
			
		$query8 = $bdd->query("SELECT * FROM lignefraisforfait where idVisiteur='".$_SESSION['id']."' AND mois='".$format."' AND idFraisForfait='KM';");
			$data8 = $query8->fetch();
			
		$query9 = $bdd->query("SELECT * FROM lignefraisforfait where idVisiteur='".$_SESSION['id']."' AND mois='".$format."' AND idFraisForfait='REP';");
			$data9 = $query9->fetch();
			
		$query2 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=1 AND mois='".$format."';");
			$data2 = $query2->fetch();
			
		$query3 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=2 AND mois='".$format."';");
			$data3 = $query3->fetch();
		
		$query4 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=3 AND mois='".$format."';");
			$data4 = $query4->fetch();
		
		$query5 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=4 AND mois='".$format."';");
			$data5 = $query5->fetch();
		
		$query6 = $bdd->query("SELECT * FROM lignefraishorsforfait where idVisiteur='".$_SESSION['id']."' AND id=5 AND mois='".$format."';");
			$data6 = $query6->fetch();
			
		$query7 = $bdd->query("SELECT * FROM fichefrais where idVisiteur='".$_SESSION['id']."' AND mois='".$format."';");
			$data7 = $query7->fetch();
			
	}

			
	?>
	<?php include("menu.php"); ?>

	</br>
	<div style="margin-top:100px;" >
	 <form action="ConsulterFicheFrais.php" method="post" >
	<div style="margin-top:-40px;">
	  Date : <input style="width:100px;border:1px solid grey" type="text" name="mois" placeholder="mois/année"/>     
	  <button type="submit" value="Valider" name="Valider" class="btn btn-dark">Valider</button>
	  </br>
	 
	</div>	
	 <h3 style="text-align:center;">Fiche frais du <b><?php echo $format; ?></b></h3>
	</form>

</div>	
			</br> </br>
		<table class="tabconsulter">	
		<tr  style="background-color:#f1ebde;background-image:linear-gradient(#f1ebde, white);">
			<td class="tabtd"><h5>ID </h5></td>
			<td class="tabtd"><h5> Prénom </h5></td>
			<td class="tabtd"> <h5>Nom </h5></td>
			<td class="tabtd"><h5> Date Embauche</h5> </td>
		<tr>
		
		<tr>
			<td> <?php  echo $data['id']; ?> </td>
			<td> <?php  echo $data['prenom']; ?></td>
			<td> <?php  echo $data['nom']; ?> </td>
			<td> <?php  echo $data['dateEmbauche']; ?> </td>
		</tr>
		
		
		</table>
		
		<table class="tabconsulter2">
		<tr style="background-color:#eed197;">
			<td class="tabtd" ><i>Frais Forfaitaires </i></td>
			<td class="tabtd"> <i>Quantité </i></td>
			<td class="tabtd"> <i>Prix unité </i></td>
					
		</tr>
		
		<tr>
			<td> NUI </td>
			<td> <?php  echo $data1['quantite']; ?></td>
			<td> 80 </td>
		</tr>
		
		<tr>
			<td>KM</td>
			<td> <?php  echo $data8['quantite']; ?></td>
			<td> 0.62</td>
		</tr>
		
		<tr>
			<td> REP </td>
			<td> <?php  echo $data9['quantite']; ?></td>
			<td> 25 </td>
		</tr>
		
		<tr style="background-color:#eed197">
			<td colspan="2"><i>Autres frais</i></td>	
			<td><i>Prix </i></td>	
			
		</tr>
		
		<tr>
	
			<td colspan="2"class="tabtd"> <?php  echo $data2['libelle']; ?></td>
			<td class="tabtd"> <?php  echo $data2['montant']; ?></td>
		</tr>
		
		<tr>
			<td colspan="2"class="tabtd"> <?php  echo $data3['libelle']; ?></td>
			<td class="tabtd"> <?php  echo $data3['montant']; ?></td>
		</tr>
		
		<tr>
			<td colspan="2"class="tabtd"> <?php  echo $data4['libelle']; ?></td>
			<td class="tabtd"> <?php  echo $data4['montant']; ?></td>
		</tr>
		
		<tr>
			<td colspan="2" class="tabtd"> <?php  echo $data5['libelle']; ?></td>
			<td class="tabtd"> <?php  echo $data5['montant']; ?></td>
		</tr>
		
		<tr>
			<td colspan="2" class="tabtd"> <?php  echo $data6['libelle']; ?></td>
			<td class="tabtd"> <?php  echo $data6['montant']; ?></td>
		</tr>
		
		<tr style="background-color:grey;color:white;">
			<td colspan="2"><b> Total </b></td>
			<td> <b> <?php  echo $data7['montantValide']; ?></b></td> </td>
		</tr>
		
	
		
		
 
 
 
 
		</table>
		
	
 
 
 
 
 
 
 
 
 
 
 
 
 

</body>
</html>
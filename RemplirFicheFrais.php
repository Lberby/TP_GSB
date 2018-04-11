<?php session_start();


if(!isset($_SESSION['prenom'])){
    header("Location: index.php"); //rediriger l’utilisateur sur la page index s'il ne s'est pas connecté.
    }
	
        require_once ("bdd.php");

        $bdd=connectDB(); //se connecte à la BDD
		$date= new DateTime('now');
		$datenow=$date->format("Y-m-d");
		$datemois=$date->format('mY');

	$res=0;		
	$res1=0;
	$res2=0;
	$res3=0;
	
	$nbnuite=0;
    $nbrp=0;
    $nbvehicule=0;
			
	$montant1=0;
    $montant2=0;
    $montant3=0;
	$montant4=0;
	$montant5=0;

		
		
        if (isset($_POST['nbNuite'])){
            $nbnuite=$_POST['nbNuite'];
            $nbrp=$_POST['nbRP'];
            $nbvehicule=$_POST['nbVehicule'];
        }

		 if (isset($_POST['montant1'])){
			$montant1=$_POST['montant1'];
            $montant2=$_POST['montant2'];
            $montant3=$_POST['montant3'];
			$montant4=$_POST['montant4'];
			$montant5=$_POST['montant5'];
			}
					
	
		 if(isset($_POST['Valider'])) 
	{
		$nbjustif=0;
		if($_POST['libelle1']!="")
		{
			$nbjustif+=1;
			if($_POST['libelle2']!="")
			{
				$nbjustif+=1;
			}
			if($_POST['libelle3']!="")
			{
				$nbjustif+=1;
			}
			if($_POST['libelle4']!="")
			{
				$nbjustif+=1;
			}
			if($_POST['libelle5']!="")
			{
				$nbjustif+=1;
			}
	
	}
	
	$nui=$_POST['nbNuite'];
    $rp=$_POST['nbRP'];
    $km=$_POST['nbVehicule'];
		

		$req1= $bdd -> query ("SELECT montant FROM fraisforfait Where id='NUI';");
            $data1 = $req1->fetch();
			
		$req2= $bdd -> query ("SELECT montant FROM fraisforfait Where id='REP';");
            $data2 = $req2->fetch();
			
		$req3=$bdd -> query ("SELECT montant FROM fraisforfait Where id='KM';");
            $data3 = $req3->fetch();
			
		 
		$res=$data1['montant']*$nui + $data2['montant']*$rp + $data3['montant']*$km + $_POST['montant1'] + $_POST['montant2']+$_POST['montant3']+$_POST['montant4']+$_POST['montant5'];
	 
	$bdd->query("INSERT INTO fichefrais (idVisiteur, mois, nbJustificatifs, montantValide, dateModif, idEtat) VALUES ('".$_SESSION['id']."','".$datemois."',$nbjustif,'".$res."','".$datenow."','CR');");
					  

	$bdd->query("INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('".$_SESSION['id']."','".$datemois."','NUI',".$nui.");");
					   
					   
	$bdd->query("INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('".$_SESSION['id']."','".$datemois."','REP',".$rp.");");
					   
					   
	$bdd->query("INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('".$_SESSION['id']."','".$datemois."','KM',".$km.");");
	
	
	
	
	$bdd->query("INSERT INTO lignefraishorsforfait (id,idVisiteur, mois, libelle, date,montant) VALUES (1,'".$_SESSION['id']."','".$datemois."','".$_POST['libelle1']."','".$_POST['date1']."','".$_POST['montant1']."');");
					   
	$bdd->query("INSERT INTO lignefraishorsforfait (id,idVisiteur, mois, libelle, date,montant) VALUES (2,'".$_SESSION['id']."','".$datemois."','".$_POST['libelle2']."','".$_POST['date2']."','".$_POST['montant2']."');");				   
					   
	$bdd->query("INSERT INTO lignefraishorsforfait (id,idVisiteur, mois, libelle, date,montant) VALUES (3,'".$_SESSION['id']."','".$datemois."','".$_POST['libelle3']."','".$_POST['date3']."','".$_POST['montant3']."');");
	
	$bdd->query("INSERT INTO lignefraishorsforfait (id,idVisiteur, mois, libelle, date,montant) VALUES (4,'".$_SESSION['id']."','".$datemois."','".$_POST['libelle4']."','".$_POST['date4']."','".$_POST['montant4']."');");
	
	$bdd->query("INSERT INTO lignefraishorsforfait (id,idVisiteur, mois, libelle, date,montant) VALUES (5,'".$_SESSION['id']."','".$datemois."','".$_POST['libelle5']."','".$_POST['date5']."','".$_POST['montant5']."');");	

	}
	
	 if(isset($_POST['Modifier'])) 

	{
	$nui=$_POST['nbNuite'];
    $rp=$_POST['nbRP'];
    $km=$_POST['nbVehicule'];
	$nbjustif=0;
	
	
		if($_POST['libelle1']!="")
		{
			$nbjustif+=1;
			if($_POST['libelle2']!="")
			{
				$nbjustif+=1;
			}
			if($_POST['libelle3']!="")
			{
				$nbjustif+=1;
			}
			if($_POST['libelle4']!="")
			{
				$nbjustif+=1;
			}
			if($_POST['libelle5']!="")
			{
				$nbjustif+=1;
			}
	
	}
	//echo $nbjustif;
		

		$req1= $bdd -> query ("SELECT montant FROM fraisforfait Where id='NUI';");
            $data1 = $req1->fetch();
			
		$req2= $bdd -> query ("SELECT montant FROM fraisforfait Where id='REP';");
            $data2 = $req2->fetch();
			
		$req3=$bdd -> query ("SELECT montant FROM fraisforfait Where id='KM';");
            $data3 = $req3->fetch();
			
		 
		
					  

	$bdd->query("UPDATE lignefraisforfait SET idVisiteur = '".$_SESSION['id']."', mois = '".$datemois."',  quantite ='".$nui."' WHERE idFraisForfait='NUI' ");
					   
					   
	$bdd->query("UPDATE lignefraisforfait SET idVisiteur = '".$_SESSION['id']."', mois = '".$datemois."' , quantite ='".$rp."' WHERE idFraisForfait='REP'");
					   
					   
	$bdd->query("UPDATE lignefraisforfait SET idVisiteur = '".$_SESSION['id']."', mois = '".$datemois."',  quantite ='".$km."' WHERE idFraisForfait='KM'");
	
	
	
	
	$bdd->query("UPDATE lignefraishorsforfait SET libelle = '".$_POST['libelle1']."', date = '".$_POST['date1']."',montant= '".$_POST['montant1']."' WHERE id=1 AND idVisiteur ='".$_SESSION['id']."' AND mois = '".$datemois."'");
					   
	$bdd->query("UPDATE lignefraishorsforfait SET libelle = '".$_POST['libelle2']."', date = '".$_POST['date2']."',montant= '".$_POST['montant2']."' WHERE id=2 AND idVisiteur ='".$_SESSION['id']."'AND mois = '".$datemois."'");
					   
	$bdd->query("UPDATE lignefraishorsforfait SET libelle = '".$_POST['libelle3']."', date = '".$_POST['date3']."',montant= '".$_POST['montant3']."' WHERE id=3 AND idVisiteur ='".$_SESSION['id']."' AND mois = '".$datemois."'");
	
	$bdd->query("UPDATE lignefraishorsforfait SET libelle = '".$_POST['libelle4']."', date = '".$_POST['date4']."',montant= '".$_POST['montant4']."' WHERE id=4 AND idVisiteur ='".$_SESSION['id']."' AND mois = '".$datemois."'");
	
	$bdd->query("UPDATE lignefraishorsforfait SET libelle = '".$_POST['libelle5']."', date = '".$_POST['date5']."',montant= '".$_POST['montant5']."' WHERE id=5 AND idVisiteur ='".$_SESSION['id']."' AND mois = '".$datemois."'");
	
	$res=$data1['montant']*$nui + $data2['montant']*$rp + $data3['montant']*$km+ $_POST['montant1'] + $_POST['montant2']+$_POST['montant3']+$_POST['montant4']+$_POST['montant5'];
		$bdd->query("UPDATE fichefrais SET  nbJustificatifs =$nbjustif, montantValide='".$res."', dateModif ='".$datenow."', idEtat='CR' WHERE idVisiteur ='".$_SESSION['id']."' AND mois ='".$datemois."'");
	}
	
	
	
?> 



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Fiche frais </title>

    <link href="FicheFrais.css?<?php echo time();?> " rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>
	
	<?php include("menu.php"); ?>
	
	
 
 



<div class="tab2">
    <form action="RemplirFicheFrais.php" method="post" >
        <p class="formRemb">  <b> REMBOURSEMENT DE FRAIS ENGAGES <b> </br></br>
  
            <div class="table-responsive" >
            <table class="table" style="width:70%">
            
            <tr>
                <td> Visiteur </td> <!--- Affiche le nom et le prenom --->
                <th colspan="2">   <?php echo  $_SESSION['prenom']. " " .$_SESSION['nom'];?>  </th> 
            </tr>

            <tr>
                <td> Date </td> <!--- Affiche la date du jour --->
                <th colspan="2"> <?php date_default_timezone_set("Europe/Paris");
                $now = new DateTime("now"); 

                $format=$now -> format("dmy"); 

                echo $format;
                 ?> </th>
            </tr>

            <tr>
                <td> Frais Forfaitaires </td>
                <td> Quantité </td>
                <td> Montant unitaire  </td>
                <td> Total </td>
            </tr>

            <tr>
                <td> Nuitée </td>
                <td>  <input class="largeur" type="number" name="nbNuite" min="0" /> 
				
				</td>
                <td> <?php $query = $bdd -> query ("SELECT montant FROM fraisforfait Where id='NUI';");
            $data = $query->fetch(); 
            echo $data['montant']; ?></td>
                <td>  <?php echo $res1=$data['montant']*$nbnuite;?> </td>

						
				
            </tr>

            <tr>
                <td> Repas Midi </td>
                <td> <input class="largeur" type="number" name="nbRP" min="0"/>  </td>
                <td> <?php $query = $bdd -> query ("SELECT montant FROM fraisforfait Where id='REP';");
            $data = $query->fetch(); 
            echo $data['montant']; ?> </td>
                <td> <?php echo $res2=$data['montant']*$nbrp;?> </td>
            </tr>

            <tr>
                <td> Véhicule </td>
                <td> <input class="largeur" type="number" name="nbVehicule" min="0"/> </td>
                <td> <?php $query = $bdd -> query ("SELECT montant FROM fraisforfait Where id='KM';");
            $data = $query->fetch(); 
            echo $data['montant']; ?> </td>
                <td> <?php echo $res3=$data['montant']*$nbvehicule;?> </td>
            </tr>

            <tr>
                <td colspan="4"> Autres Frais </td>
            </tr>

             
            <tr>
                <td> Date </td>
                <td colspan="2"> Libellé </td>
                <td> Montant </td>
            </tr>

            <tr>
               <td>  <input type="date" class="form-control" name="date1">  </td>
                
                <td colspan="2"> <input type="text" name="libelle1" min="0"/> </td>
                <td> <input style="width:60px" type="number" name="montant1" min="0"/>   </td>
            </tr>
			
			<tr>
               <td>  <input type="date" class="form-control" name="date2">  </td>
                
                <td colspan="2"> <input type="text" name="libelle2" min="0"/> </td>
                <td> <input style="width:60px" type="number" name="montant2" min="0"/>   </td>
            </tr>
			
			<tr>
               <td>  <input type="date" class="form-control" name="date3">  </td>
                
                <td colspan="2"> <input type="text" name="libelle3" min="0"/> </td>
                <td> <input style="width:60px" type="number" name="montant3" min="0"/>   </td>
            </tr>
			
			<tr>
                <td>  <input type="date" class="form-control" name="date4">   </td>
                
                <td colspan="2"> <input type="text" name="libelle4" min="0"/> </td>
                <td> <input style="width:60px" type="number" name="montant4" min="0"/>   </td>
            </tr>
			
			<tr>
               <td>  <input type="date" class="form-control" name="date5">  </td>
                
                <td colspan="2"> <input type="text" name="libelle5" min="0"/> </td>
                <td> <input style="width:60px" type="number" name="montant5" min="0"/>   </td>
            </tr>

            <tr>
                <td colspan="6"> Total  </td>
                <td style="background-color:grey;color:white"> 
				<?php 
				echo $res=$res1+$res2+$res3+$montant1+$montant2+$montant3+$montant4+$montant5;?> € </td>
              
            </tr>

             </table>

 <button type="reset" value="Effacer" class="btn btn-outline-primary">Effacer</button>
           <button type="submit" value="Valider" name="Valider" class="btn btn-outline-success">Valider</button>
		   <button type="submit" value="Modifier" name="Modifier" class="btn btn-outline-warning">Modifier</button>
</div>
           
       </p>
   </form>
   </div>


 

</body>
</html>
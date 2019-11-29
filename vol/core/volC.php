<?PHP
include "../config.php";
include_once "../entities/vol.php";

class volC {
function affichervol ($vol){
		echo "idVol: ".$vol->getidVol()."<br>";
		echo "airline: ".$vol->getairline()."<br>";
		echo "lieu_a: ".$vol->getlieu_a()."<br>";
		echo "lieu_d: ".$vol->getlieu_d()."<br>";
		echo "date_d: ".$vol->getdate_d()."<br>";
		echo "date_r: ".$vol->getdate_r()."<br>";
		echo "heure_d: ".$vol->getheure_d()."<br>";
		echo "heure_r: ".$vol->getheure_r()."<br>";
	}
	
	function ajoutervols ($vol){
		$sql="insert into vols (idVol,airline,lieu_a,lieu_d,date_d,date_r,heure_d,heure_r) values 
(:idVol, :airline,:lieu_a,:lieu_d,:date_d,:date_r,:heure_d,:heure_r)";
		$db = config::getConnexion();
		try{

        $req=$db->prepare($sql);
        $idVol=$vol->getidVol();
        $airline=$vol->getairline();
        $lieu_a=$vol->getlieu_a();
        $lieu_d=$vol->getlieu_d();
        $date_d=$vol->getdate_d();
        $date_r=$vol->getdate_r();
        $heure_d=$vol->getheure_d();
        $heure_r=$vol->getheure_r();
        //lier variable => paramètre
        $req->bindValue(':idVol',$idVol);
		$req->bindValue(':airline',$airline);
		$req->bindValue(':lieu_a',$lieu_a);
		$req->bindValue(':lieu_d',$lieu_d);
		$req->bindValue(':date_d',$date_d);
		$req->bindValue(':date_r',$date_r);
		$req->bindValue(':heure_d',$heure_d);
		$req->bindValue(':heure_r',$heure_r);
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function affichervols(){
		$sql="SElECT * From vols";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimervols($idVol){
		$sql="DELETE FROM vols where idVol= :idVol";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idVol',$idVol);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
            
	}
}
function modifiervols($vool){
		$sql="UPDATE vols SET idVol=:idVol, airline=:airline,lieu_a=:lieu_a,lieu_d=:lieu_d,date_d=:date_d,date_r=:date_r,heure_d=:heure_d,heure_r=:heure_r WHERE idVol=:idVol";
		$db = config::getConnexion();
try{

        $req=$db->prepare($sql);
		$idVoln=$vool->getidVol();
        $airline=$vool->getairline();
        $lieu_a=$vool->getlieu_a();
        $nb=$vool->getlieu_d();
        $date_d=$vool->getdate_d();
         $date_r=$vool->getdate_r();
         $heure_d=$vool->getheure_d();
         $heure_r=$vool->getheure_r();
		$datas = array(':idVol'=>$idVol, ':airline'=>$airline,':lieu_a'=>$lieu_a,':lieu_d'=>$lieu_d,':date_d'=>$date_d,':date_r'=>$date_r,':heure_d'=>$heure_d,':heure_r'=>$heure_r);
		//lier variable => paramètre
		$req->bindValue(':idVol',$idVol);
		$req->bindValue(':airline',$airline);
		$req->bindValue(':lieu_a',$lieu_a);
		$req->bindValue(':lieu_d',$lieu_d);
		$req->bindValue(':date_d',$date_d);
		$req->bindValue(':date_r',$date_r);
		$req->bindValue(':heure_d',$heure_d);
		$req->bindValue(':heure_r',$heure_r);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
function recuperervols($idVol){
		$sql="SELECT * from vols where idVol=$idVol";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
}
session_start();
	?>
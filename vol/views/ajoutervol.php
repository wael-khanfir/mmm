<?PHP
include "../entities/vol.php";
include "../core/volC.php";

if (isset($_POST['save']))
{
$vol=new vol($_POST['idVol'],$_POST['airline'],$_POST['lieu_a'],$_POST['lieu_d'],$_POST['date_d'],$_POST['date_r'],$_POST['heure_d'],$_POST['heure_r']);

$vol1C=new volC();
if (empty($_POST['airline']) && empty($_POST['lieu_a']) && empty($_POST['lieu_d']))
{
	echo"verifier champ";
}
$vol1C->ajoutervols($vol);
$_SESSION["message"]="Record has been saved!";
$_SESSION["msg_type"]="success";
	header('Location: crud.php');
}
else{
	echo "vérifier les champs!!";
}



?>
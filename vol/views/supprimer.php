<?PHP
include "../core/volC.php";
session_start();
$v=new volC();
if (isset($_GET["delete"])){
	$idVol=$_GET["delete"];
	$v->supprimervols($idVol);
$_SESSION["message"]="Record has been deleted!";
$_SESSION["msg_type"]="danger";
header('Location: crud.php');
    }

else
{
	echo "erreur";
}


?>
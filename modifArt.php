<?PHP
include "../../entities/article.php";
include "../../core/articleC.php";

if (isset($_POST['date_a'])){
    echo "1";
    $a1C=new articleC();
    echo"2";
$a=new article($_POST['date_a'], $_POST['titre'], $_POST['editor1'], $_POST['image']);
echo"3";
$a1C->modifierarticle($a,$_POST['date_a']);

header('Location:afficherarticle.php');

}
?>

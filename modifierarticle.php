<?PHP
include "../../core/articleC.php";
include "../../entities/article.php";
include "header.php";
if (isset($_GET['date_a'])){
    $artC =new articleC();
    echo "1";
    $r=$artC->recupererarticle($_GET['date_a']);
    echo "1";
    foreach($r as $emp){
        $date_a=$emp['date_a'];
        $titre=$emp['titre'];
        $editor1=$emp['editor1'];
        $image=$emp['image'];
    }
}

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">produits</a>
            </li>
            <li class="breadcrumb-item active">Modifier article</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Modifier article</div>
            <div class="card-body">
                <form method="POST" action="modifArt.php" >
                    <div class="form-group">
                        <div class="form-row">
                            <label for="exampleInputName">date ajout</label>
                            <input class="form-control" name="date_a" type="date"  value="" required>

                            <label for="exampleInputName">titre</label>
                            <input class="form-control" name="titre" type="text"  value="" required>

                        </div>
                       
                        <div class="form-row">
                        <label for="exampleInputEmail1">description</label>
                        <input class="form-control" name="editor1" type="text"  value=""  required>
                        </div>

 <div class="form-row">

                            <label for="exampleInputLastName">image</label>
                            <input class="form-control" name="image"  type="text"   value=""   required>

                        </div>

                        
                        <div class="form-row">
                        
                        <input class="form-control" type="submit" name="modifier" value="modifier">
                        </div>
                    </div>
            </form>
            </div>

        </div>
    </div>

</div>

<?php include 'footer.php' ; ?>


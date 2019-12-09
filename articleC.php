<?PHP
include"../config.php";

//include_once "../entities/a.php"
class articleC {
    protected $db;

    function afficherarticle ($a){

        echo "date_a: ".$a->getdate_a()."<br>";
        echo "titre: ".$a->gettitre()."<br>";
        echo "editor1: ".$a->geteditor1()."<br>";
        echo "image: ".$a->getimage()."<br>";
    }
    public function recupererarticle($date_a){

        $conn = NULL;
        try{
            echo"1111";
            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
        $sql="SELECT * from article where date_a=$date_a";
        $this->db = $conn;
        try{
            $liste=$this->db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajouterarticle ($a){



        $sql="insert into article (date_a,titre,editor1,image) values 
(:date_a, :titre, :editor1, :image)";
        $conn = NULL;
        try{
            echo"1111";
            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
        $this->db = $conn;
        try{

            $req=$this->db->prepare($sql);
            $date_a=$a->getdate_a();
            $titre=$a->gettitre();
            $editor1=$a->geteditor1();
            $image=$a->getimage();
    
            //lier variable => paramètre
            $req->bindValue(':date_a',$date_a);
            $req->bindValue(':titre',$titre);
            $req->bindValue(':editor1',$editor1);
            $req->bindValue(':image',$image);
            
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }
    function modifierarticle($e,$date_a){
        $conn = NULL;
        try{
            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->db = $conn;
        


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
           

            
            $date_a=$e->getdate_a();
            $titre=$e->gettitre();
            $editor1=$e->geteditor1();
            $image=$e->getimage();
            
                $sql="UPDATE article SET date_a='$date_a', titre='$titre', editor1='$editor1', image='$image' WHERE date_a='$date_a'";
                     $req = $this->db->prepare($sql);
            $datas =array(':date_a'=>$date_a, ':titre'=>$titre,':editor1'=>$editor1,'image'=>$image);
            
            $req->bindValue(':date_a',$date_a);
            $req->bindValue(':titre',$titre);
            $req->bindValue(':editor1',$editor1);
            $req->bindValue(':image',$image);
            $req->execute();


        }
        catch (Exception $z){
            echo " Erreur ! ".$z->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }

    function affiche_a(){
        $conn = NULL;
        try{
            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
        $this->db = $conn;
        $sql="SElECT * From article";
        try{
            $liste=$this->db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }




    public function supprimer_a($titre)
    {
        echo"2222";
        $conn = NULL;
        try{
            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"33333";
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
        $this->db = $conn;
        $sql = "DELETE  FROM `article` WHERE `titre`=:titre";
        $req= $this->db->prepare($sql);
        $req->bindValue(':titre',$titre);
        $req->execute();

    }
}
?>
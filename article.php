<?php
class article{
    public $date_a;
    public $titre;
    public $editor1;
    public $image;
   
    function __construct($date_a,$titre,$editor1,$image){
        $this->date_a=$date_a;
        $this->titre=$titre;
        $this->editor1=$editor1;
        $this->image=$image;
       
    }
    function setdate_a($date_a){
        $this->date_a=$date_a;
    }
    function getdate_a(){
        return $this->date_a;
    }
    function settitre($titre){
        $this->titre=$titre;
    }
    function gettitre(){
        return $this->titre;
    }
  function seteditor1($editor1){
        $this->editor1=$editor1;
    }
    function geteditor1(){
        return $this->editor1;}

    function setimage($image){
        $this->image=$image;
    }
    function getimage(){
        return $this->image;
    }
}
?>
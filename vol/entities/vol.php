	<?php
	class vol{
		public $idVol;
		public $airline;
		public $lieu_a;
		public $lieu_d;
		public $date_d;
		public $date_r;
		public $heure_d;
		public $heure_r;

	function __construct($idVol,$airline,$lieu_a,$lieu_d,$date_d,$date_r,$heure_d,$heure_r){
		$this->idVol=$idVol;
		$this->airline=$airline;
		$this->lieu_a=$lieu_a;
		$this->lieu_d=$lieu_d;
		$this->date_d=$date_d;
		$this->date_r=$date_r;
		$this->heure_d=$heure_d;
		$this->heure_r=$heure_r;
	}
	function getidVol(){
		return $this->idVol;
	}
	function setairline($airline){
		$this->airline=$airline;
	}
	function getairline(){
		return $this->airline;
	}
	function setlieu_a($lieu_a){
		$this->lieu_a=$lieu_a;
	}
	function getlieu_a(){
		return $this->lieu_a;
	}
	function setlieu_d($lieu_d){
		$this->lieu_d=$lieu_d;
	}
	function getlieu_d(){
		return $this->lieu_d;
	}
	function setdate_d($date_d){
		 $this->date_d=$date_d;
	}
	function getdate_d(){
		return $this->date_d;}

		function setdate_r($date_r){
		 $this->date_d=$date_d;
	}
	function getdate_r(){
		return $this->date_r;
	}
	function setheure_d($heure_d){
		 $this->heure_d=$heure_d;
	}
	function getheure_d(){
		return $this->heure_d;
	}
	function setheure_r($heure_r){
		 $this->heure_r=$heure_r;
	}
	function getheure_r(){
		return $this->heure_r;
	}
	}
	?>
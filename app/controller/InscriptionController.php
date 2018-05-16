<?php

class InscriptionController {

	private function checkNames($name1, $name2) {
		if(strlen($name1)>=2 && strlen($name2)>=2) {
			return true;
		}
		return false;
	}

	private function isLeapYear($year) {
		return ($year%400==0)||(($year%4==0)&&($year%100!=0));
	}
	private function checkDate($day, $month, $year) {
		//if(($day=="") || ($month=="") || ($year=="")) {return false;}
		/* Si le mois est
		 * avril, juin, septembre ou novembre,
		 * on a 30 jours */
		 if(in_array($month,[4,6,9,11]) && $day>30) {return false;}
		 /* Si le mois est
		  * fevrier,
		  * on a 29 jours si l'annee est bissextile,
		  * 28 jours sinon */
		 else if($month==2) {
			// si l'annee est bissextile -> 29 jours
			if(isLeapYear($year) && $day>29) {return false;}
			// sinon -> 28 jours
			else if(!isLeapYear($year) && $day>28) {return false;}
		}
		 // pour les autres mois, pas de verifications necessaires
		 // (le champs jour contient 31 jours)
		return true;
	}

	private function checkMail($mail) {
		return filter_var($mail,FILTER_VALIDATE_EMAIL);
	}

	private function checkPass($pass1, $pass2) {
		return strlen($pass1)>=6 && ($pass1==$pass2); 
	}

	public function validate($name1, $name2, $day, $month, $year, $mail, $pass1, $pass2) {
		return (
		$this->checkNames($name1, $name2) &&
		$this->checkDate($day, $month, $year) &&
		$this->checkMail($mail) &&
		$this->checkPass($pass1, $pass2)
		);
	}

}

<?php
function karsila($bitis,$bas) {


 if($bas["year"]<$bitis["year"])return true;
		else if($bas["year"]>$bitis["year"])return false;
		else 		if($bas["month"]<$bitis["month"])return true;
		else if($bas["month"]>$bitis["month"])return false;
		else 		if($bas["day"]<$bitis["day"])return true;
		else if($bas["day"]>$bitis["day"])return false;else return false;
}
 function tarih_ver($date)//tarih pars edilirse bu şekilde
 {
	 return $date["year"].'-'.$date["month"].'-'.$date["day"];
 }
?>		
		
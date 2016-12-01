<?php
include 'bag.php';

$q=$_REQUEST["q"];
/*

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}
*/
$sql = "SELECT e.adres ,e.oSayisi,i.ad,i.soyad,i.telNo,e.ucret ,ev.eTip
FROM ev e,sahip s,evtip ev,insan i 
where e.evNo=s.evNo and s.kNO=i.kNo and ev.eNo=e.eNo and e.evNo=".$q."";
$result = $conn->query($sql);
?>
<table style="width:100%">
  <tr>
    <th>adres</th>
    <th>oda sayisi</th> 
    <th>ad</th>
	<th>soyad</th>
	<th>telefon</th>
	<th>ücret</th>
	<th>ev tipi</th>
  </tr>
 
<?php
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo   '<tr><td>'.$row["adres"].'</td><td>'.$row["oSayisi"].'</td><td>'.$row["ad"].'</td><td>'.$row["soyad"].'</td><td>'.$row["telNo"].'</td><td>'.$row["ucret"].'</td><td>'.$row["eTip"].'</td></tr>';
    }
	echo "</table>";
	
} 

// Output "no suggestion" if no hint was found or output correct values 
// echo $hint === "" ? "no suggestion" : $hint;
?>
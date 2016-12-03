<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
</head>

<?php
include "nav.html";
include "bag.php";
include "function.php";
$id=$_GET["id"];
echo "<h1>ev sahipleri</h1>";
$sql = "select insan.ad,insan.soyad,insan.telNo,ev.ucret,ev.oSayisi,ev.adres from ev,sahip,insan where ev.evNo=sahip.evNo and insan.kNo=sahip.kNo and ev.evNo=".$id."";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p>ad: " . $row["ad"]. " - soyad: " . $row["soyad"]. "  telefon:" . $row["telNo"]. "-ucret:". $row["ucret"]." adres:".$row["adres"]. " - odasayisi:" . $row["oSayisi"]."</p><br>";
    }
} else {
    echo "0 results";
}


?>
<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
</head><?php 
include "bag.php"; 
include "function.php";
include "nav.html";
$date=date_parse(date("Y-m-d"));
$sql = "select e.evNo,i.kNo,i.ad,i.soyad ,k.baslangic,k.bitis,e.adres,ev.eTip,e.oSayisi from kira k,ev e,insan i,evtip ev,sahip s where ev.eNo=e.eNo and e.evNo=s.evNo and i.kNo=k.kNo and k.evNo=e.evNo and k.bitis>".tarih_ver($date)."";
$result = $conn->query($sql);

echo "<h1>kiradakiler</h1><div style='overflow-x:auto;'>


<table style='width:75%'>
  <tr>
    <th>ad</th>
    <th>soyad</th> 
    <th>baslangic</th>
	    <th>bitis</th>
    <th>adres</th> 
    <th>evTip</th>
	    <th>oda sayisi</th>
    <th>ayrýntýlý </th> 
  </tr>";
  
  

  
  
  
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  echo "<tr>
    <td>" . $row["ad"]. "</td>
    <td>" . $row["soyad"]. " </td> 
    <td  bgcolor='#FF0000'>" . $row["baslangic"]. "</td>
	    <td bgcolor='#00FF00'>". $row["bitis"]."</td>
    <td>".$row["adres"]. " </td> 
    <td>".$row["eTip"]." </td>
	    <td>". $row["oSayisi"]."</td>
    <td><a href=kiralar.php?id=".$row["evNo"].">sahibi</a></td>
  </tr>";
    }
} else {
    echo "0 results";
}
echo "</table></div>";
$conn->close();
?>
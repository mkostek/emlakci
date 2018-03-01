<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
</head><?php 
include "bag.php"; 
include "function.php";
include "nav.html";
$sql = "select distinct(e.evNo),i.kNo,i.ad,i.soyad ,k.baslangic,k.bitis,e.adres,ev.eTip,e.oSayisi,k.kiNo 
from kira k,ev e,insan i,evtip ev,sahip s
 where ev.eNo=e.eNo and e.evNo=s.evNo and i.kNo=k.kNo and k.evNo=e.evNo and k.bitis>NOW() order by k.bitis asc";
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
    <th>ayrıntılar </th> 
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
	<td><a href=cikart.php?id=".$row["kiNo"].">bitir</a></td>
  </tr>";
    }
} else {
    echo "0 results";
}
echo "</table></div>";
$conn->close();
?>
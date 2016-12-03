<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
</head>

<form action="insanekle.php">
<?php
include "bag.php";include "nav.html";
$sql = "SELECT * FROM  evtip";
$result = $conn->query($sql);
echo 'ev Tipini seçiniz:<select name="tip">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["eNo"].">".$row["eTip"]."</option>";
    }
} 
    echo "</select><br>";
?>
adresi giriniz:<input type="text" name="adres"><br>
ücretini giriniz:<input type="text" name="ücret"><br>
oda sayısını giriniz:<input type="text" name="oda"><br>
<input type="submit" value="gonder">
</form>



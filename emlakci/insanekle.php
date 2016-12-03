<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
</head><?php

include "nav.html";
include "bag.php";
session_start();

if(isset($_GET['oda'])&&isset($_GET['tip'])&&isset($_GET['ücret'])&&isset($_GET['adres']))
{
	$sql = "INSERT INTO ev(oSayisi,eNo,ucret,adres) VALUES (".$_GET['oda'].",".$_GET['tip'].",".$_GET['ücret'].",'".$_GET['adres']."');";

if ($conn->query($sql) === TRUE) {
    echo "Yeni ev başarı ile eklendi<br>";
	unset($_GET['oda'],$_GET['tip'],$_GET['tip']);
	$_SESSION['var']=$conn->insert_id;
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}


    echo "</select>";
echo "<br>Eğer yeni bir kişi eklemek istiyorsanız aşağıdaki form ile ekleyiniz...";?>
<br><form action="ekle.php" method="post">
ad:<input type="text" name="ad" /><br>
soyad:<input type="text" name="soyad" /><br>
telefon:<input type="text" name="tel" /><br>

<input type="submit" value="kişi ekle"/>

</form>
<form action="sahip.php" method="post">
<?php echo "<br>Yeni eklenen evin sahiplerini ekleyiniz....";
$sql = "SELECT * FROM  insan";
$result = $conn->query($sql);
echo '<br>kişiyi seçiniz:<select name="kisi">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["kNo"].">".$row["ad"]." ".$row["soyad"]."</option>";
    }
} 
echo "</select><br>"; ?>
<input type="hidden" name="eNo" value="<?php echo $_SESSION['var']; ?>"/>
<input type="submit" value="sahip ekle">
</form>

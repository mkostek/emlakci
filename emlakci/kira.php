<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
</head>

<?php
include "bag.php";include "nav.html";
if(isset($_POST['baslangic']&&isset($_POST['bitis'])){
	$sql = "select *from ev where evNo not in( select evNo FROM kira where bitis>'".date("D.M.Y")."')";
$result = $conn->query($sql);
echo '<br>kişiyi seçiniz:<select name="ev">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["evNo"].">odaSayisi:".$row["odaSayisi"].",ücret:".$row["ucret"]."</option>";
    }
} 
echo "</select><br>"; 
}
?>

<form action="kiraekle.php" method="post">
baslangic tarihi:<input type="text" name="baslangic" /><br>
bitis tarih:<input type="text" name="bitis"/><br> 
<input type="submit" value="ara" />

</form>
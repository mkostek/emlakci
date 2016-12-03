<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
</head>

<?php
include "bag.php";include "nav.html";
	if(isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['tel'])) {
	$sql = "INSERT INTO insan(ad,soyad,telNo) VALUES ('".$_POST["ad"]."','".$_POST['soyad']."','".$_POST['tel']."');";
	if ($conn->query($sql) === TRUE) {
    echo "Yeni kişi başarı ile eklendi<br>";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}echo '<br>geri dönmek için burayı kullanın<a href="insanekle.php">ev ekranı</a><br>';
echo '<br>kira eklemek için <a href="kiraEkle.php">ev ekranı</a><br>';
}
?>
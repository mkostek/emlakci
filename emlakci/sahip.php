<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
</head>
<?php
include "nav.html";
include "bag.php";
	if(isset($_POST['eNo']) && isset($_POST['kisi']) ) {
	$sql = "INSERT INTO sahip(kNo,evNo) VALUES (".$_POST["kisi"].",".$_POST['eNo'].");";
	if ($conn->query($sql) === TRUE) {
    echo "Yeni sahip başarı ile eklendi<br>";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
echo '<br>geri dönmek için <a href="insanekle.php">ev ekranı</a>';
}

//SELECT e.adres ,e.oSayisi,i.ad,i.soyad,i.telNo,e.ucret FROM ev e,sahip s,evtip ev,insan i where e.evNo=s.evNo and s.kNO=i.kNo and ev.eNo=e.eNo and e.evNo

?>



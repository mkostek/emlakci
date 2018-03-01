<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
<script>
window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "index.php";

    }, 1000);
</script>
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
}

//SELECT e.adres ,e.oSayisi,i.ad,i.soyad,i.telNo,e.ucret FROM ev e,sahip s,evtip ev,insan i where e.evNo=s.evNo and s.kNO=i.kNo and ev.eNo=e.eNo and e.evNo

?>



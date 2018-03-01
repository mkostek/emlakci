<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
<script>
function gonder(){
window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "index.php";

    }, 1000);
}
function gonderd(){
window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "kiraekle.php";

    }, 1000);
}
</script>
</head><?php
include "bag.php";
include "function.php";

include "nav.html";
	if(isset($_POST['baslangic']) && isset($_POST['bitis']) && isset($_POST['ev'])) {
		$date=date_parse(date("Y-m-d"));
		$bas=date_parse($_POST['baslangic']);
		$bitis=date_parse($_POST['bitis']);
	if(karsila($bas,$date)&&karsila($bitis,$date)&&karsila($bitis,$bas)){
	$sql = "INSERT INTO kira(baslangic, bitis, evNo, kNo) VALUES ('".tarih_ver($bas)."','".tarih_ver($bitis)."',".$_POST['ev'].",".$_POST['kisi'].")";
	if ($conn->query($sql) === TRUE) {
      ?> <body onload="gonder()">kiracı ev ile başarı ile eklendi</body><?php
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}else echo '<body onload="gonderd()">tarihte bir yanlışlık var vesselam</body>';
}
		
	/*$sql = "INSERT INTO insan(ad,soyad,telNo) VALUES ('".$_POST["ad"]."','".$_POST['soyad']."','".$_POST['tel']."');";
	if ($conn->query($sql) === TRUE) {
    echo "Yeni kişi başarı ile eklendi<br>";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}echo '<br>geri dönmek için <a href="insanekle.php">ev ekranı</a>';
}*/
?>
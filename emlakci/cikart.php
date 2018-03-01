<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
<script>
window.setTimeout(function(){

        // Move to a new location or you can do something else
		window.alert("1 sn içinde anasayfaya yönlendirileceksiniz... ");
        window.location.href = "index.php";

    }, 1000);
</script>

</head>

<?php
include "nav.html";
include "bag.php";
include "function.php";
$id=$_GET["id"];
echo "<h1>Kira güncelleme</h1>";
$sql = "update kira set bitis=NOW() where kiNo=".$id."";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "kayıt başarı ile güncellendi";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}


?>

<?php
include "bag.php";
?>
<html>

	<head>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
		  $( function() {
			  $( ".datepicker" ).datepicker();
			$( ".datepicker" ).datepicker( "option", "dateFormat", "yy-m-d" );
			} );
			function showHint()
			{
			var str=document.getElementById("ev").value;
			if(str=="")
			{
			document.getElementById("calis").innerHTML="";return;
			}else
			{
			if(window.XMLHttpRequest)
			{
			xmlhttp=new XMLHttpRequest();
			}
			else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if(xmlhttp.readyState==4&&xmlhttp.status==200)
			{
			document.getElementById("calis").innerHTML=xmlhttp.responseText;
			}
			};
			xmlhttp.open("GET","getHint.php?q="+str,true);xmlhttp.send();
			}
			}
		</script>
	</head>
<form action="addKira.php" method="post">
baslangic tarihi:<input type="text" name="baslangic" class="datepicker" /><br>
bitis tarih:<input type="text" name="bitis" class="datepicker" /><br><?php 	
if(isset($_GET['ücret'])&&isset($_GET['oSayisi'])&& isset($_GET['ücret'])&& isset($_GET['tip']) && isset($_GET['adres']))
	$sql="select *from ev where eNo=".$_GET['tip']." and ucret<".$_GET['ücret']." and oSayisi<".$_GET['oSayisi']." and adres like '%".$_GET['adres']."%' and  evNo not in( select evNo FROM kira where bitis>'".date("Y-m-d")."' )";
else
	$sql = "select *from ev where and evNo not in( select evNo FROM kira where bitis>'".date("Y-m-d")."')";
$result = $conn->query($sql);
?><br>kişiyi seçiniz:<select name="ev" id="ev"  onchange="showHint()">
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["evNo"].">odaSayisi:".$row["oSayisi"].",ücret:".$row["ucret"]."</option>";
    }
} 
echo "<option value=1000 selected>odaSayisi: ücret: </option></select><br>"; 
echo "<br>kiacıyı ekleyiniz....";
$sql = "SELECT * FROM  insan";
$result = $conn->query($sql);
echo '<br>kişiyi seçiniz:<select name="kisi">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["kNo"].">".$row["ad"]." ".$row["soyad"]."</option>";
    }
} echo "</select><br>eğer yoksa buradan ekleyebilirisiniz...<br>";
?>
<input type="submit" value="ekle" />
<br><form action="ekle.php" method="post">
ad:<input type="text" name="ad" /><br>
soyad:<input type="text" name="soyad" /><br>
telefon:<input type="text" name="tel" /><br>

<input type="submit" value="kişi ekle"/>

</form>
</form>
<form action="kiraekle.php" action="post">
ücret:<input type="text" name="ücret">
oda Sayisi:<input type="text" name="oSayisi"/>
adres:<input type="text" name="adres"/>
<?php
$sql = "SELECT * FROM  evtip";
$result = $conn->query($sql);
echo 'ev Tipini seçiniz:<select name="tip">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["eNo"].">".$row["eTip"]."</option>";
    }
	echo	"<option value= > </option>";
} 
    echo "</select><br>";
	?>
	<p id="calis" ></p>
<input type="submit" value="ara" />
</form>
</html>
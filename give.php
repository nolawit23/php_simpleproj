<!DOCTYPE html>
<?php
	include("connection.php");  
 session_start();
 if($_SESSION['usertype']!='pharmasist' || $_SESSION['username']=="" ){
	header("location:index.php");
	}
if(isset($_SESSION['userid']))
 {
  $mail=$_SESSION['userid'];
 } else {
 ?>

<script>
  alert('You Are Not Logged In !! Please Login to access this page');
  alert(window.location='index.php');
 </script>
 <?php
 }
 ?>

<?php

$user_id=$_SESSION['userid'];
$user=$_SESSION['username'];


?>
<html>
<link rel="stylesheet" type="text/css" media="all" href="5/date.css" />
<script type="text/javascript" src="5/date.js"></script>
<head>
<script>
function update(){
				var des=confirm("are you sure you want to update this account?");
			
	if(des==true){
					alert("update sucessfull");
				}
				else
				return false;}
</script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
</script>
<script type="text/javascript">
    var timenow = new Date();
    timenow.format("UTC:h:MM:ss TT Z");
    document.getElementById("date").value = new Date().toUTCString();
</script>
<script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("pick_date").value);
                var pickdt = new Date(document.getElementById("drop_date").value);
                return parseInt((pickdt - dropdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("drop_date")){
            document.getElementById("numdays2").value=GetDays();
        }  
    }

    </script>
	<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<style>
	#register td
	{
		font-size: 30;
	}
</style>
</head>
<body id="body">

	<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'drug');
if(isset($_GET['drug_id']))
{
$hn=$_GET['drug_id'];
if(isset($_POST['submit']))
{
$drug_id=$_POST['drug_id'] ;


$drug_name=$_POST['drug_name'] ;
$drug_dosage=$_POST['drug_dosage'] ;
	$quantity=$_POST['quantity'] ;
	$price=$_POST['price'] ;
	$date=$_POST['date'] ;
	
$a=$quantity*$price;

//if(($_REQUEST['quantity']-$quantity)>0){
					$insert=mysqli_query($con,"insert into saled_drug (drug_id,drug_name,drug_dosage,quantity,price,date)values('$drug_id','$drug_name','$drug_dosage','$quantity','$a','$date')"); 
		if($insert)
		{
			echo '<Script>alert("Successfully sold!!")</script>';
			$query3=mysqli_query($con,"update drug set quantity=quantity-'$quantity' where drug_id='$_GET[drug_id]'");
			
			}
		else
		{
			echo mysqli_error();
}
//}
//else{
	//echo '<Script>alert("quantity cannot not negative ")</script>';
//}



}
$query1=mysqli_query($con,"select * from drug where drug_id='$_GET[drug_id]'");
$query2=mysqli_fetch_array($query1);

?>
<div id="register" style="
	border: solid 3px #fefcfc;width: 600px;height: auto;margin-top: -1px;margin-left:70px;background-color:#778899 ">
<form action="" method="POST" name="addmult">
<table cellpadding="8" style="margin-left: 150px">
<tr><td colspan="2" ><p><font size="6" color="#045349"> Sale Drug</font> </p></td></tr>
<tr><td><b>Drug ID:</b></td><td>
<input name="drug_id" type="text"  value="<?php echo $query2['drug_id']; ?>" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>

<tr><td ><b>Drug Name :</b></td><td>
<input name="drug_name" type="text" readonly="readonly" value="<?php echo $query2['drug_name']; ?>" 
style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>
<tr><td ><b>Drug Dosage  :</<b></td><td>
<input name="drug_dosage" type="text" readonly="readonly" value="<?php echo $query2['drug_dosage']; ?>" 
style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>
<tr><td ><b>Unit Price  :</<b></td><td>
<input name="price" type="text" readonly="readonly" value="<?php echo $query2['price']; ?>" style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>
<tr><td ><b>Quantity :</<b></td><td>
<input name="quantity"  required type="text" value="" onKeyPress="return isNumberKey(event);" 
style=" margin-bottom: 10px;width: 180px;height: 30px; 	border:1px Solid #071f56;"/></td></tr>


 <tr><td>
<b>Date:</b></td ><td><input type="text" name="date" size="25" class="textbox"  readonly required
 value="<?php echo date("Y-m-d");?>"  id=""  style=" margin-bottom: 10px;width: 180px;height: 30px;border:1px Solid #071f56;"></td></tr>
   <tr><td>

  
<tr><td><input type="submit" name="submit" value="Sale" style="background-color: #20645b;color: #fffbfb;width:100px;height: 40px;font-size: 20px"></td>
<td><input type="submit" name="reset" value="Rset"style="background-color: #20645b;color: #fffbfb;height: 40px;width:100px;font-size: 20px"></tr>
</table>
</form>
<?php
}
?>
</div>
</body>
</html>

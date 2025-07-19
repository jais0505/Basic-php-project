<?php
include("../Assets/connection/connection.php");

$district_name;
if(isset($_POST['btn_submit'])){
  $disrict_name=$_POST['txt_districtname'];
  $inQuery="insert into tbl_district(district_name) values('".$disrict_name."')";
  if($con->query($inQuery)){
    ?>
    <script>
      alert("District added");
      window.location="district.php";
    </script>
    <?php
  } else{
    ?>
    <script>
      alert("Inerstion Failed");
      window.location="district.php";
    </script>
    <?php
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="307" border="1">
    <tr>
      <td colspan="2"><div align="center">District Form</div></td>
    </tr>
    <tr>
      <td width="155"><div align="center">District name</div></td>
      <td width="50"><label for="txt_districtname"></label>
      <input type="text" name="txt_districtname" id="txt_districtname" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<br><br>
<table border="1">
  <tr>
    <th width="100">Sl NO</th>
    <th width="100">District</th>
    <th width="100">Action</th>
  </tr>
  <tr>
    <php?
      ?$selQuery="select * from tbl_district()";
      $row=$con->query($selQuery);
    ?>
    <td width="100"></td>
    <td width="100"></td>
    <td width="100"></td>
  
  </tr>
</table>
</body>
</html>

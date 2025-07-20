<?php
include("../Assets/connection/connection.php");

$district_name = "";
$dis_id = 0;
$dis_name = "";
if(isset($_POST['btn_submit'])){
  $district_name=$_POST['txt_districtname'];
  $hid=$_POST['txt_hidden'];
  if($hid){
    $upQuery="update tbl_district set district_name='".$district_name."' where district_id='".$hid."' ";
   if($con->query($upQuery)){
     ?>
    <script>
      alert("District updated");
      window.location="district.php";
    </script>
    <?php
   } else{
     ?>
    <script>
      alert("District updation failed");
      window.location="district.php";
    </script>
    <?php
   }
  } else{
    $inQuery="insert into tbl_district(district_name) values('".$district_name."')";
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
  
}
if(isset($_GET['did'])){
    $delQuery="delete from tbl_district where district_id='".$_GET['did']."' ";
    if($con->query($delQuery)){
      ?>
      <script>
        alert("District deleted");
        window.location="district.php";
      </script>
      <?php
    } else{
      ?>
      <script>
        alert("District deletion failed");
        window.location="district.php";
      </script>
      <?php
    }
  }

  if(isset($_GET['eid'])){
    $selQuery="select * from tbl_district where district_id='".$_GET['eid']."' ";
    $row=$con->query($selQuery);
    $data=$row->fetch_assoc();
    $dis_id=$data['district_id'];
    $dis_name=$data['district_name'];
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
      <input type="hidden" name="txt_hidden" id="txt_hidden" value="<?php echo $dis_id ?>"/>
      <input type="text" name="txt_districtname" id="txt_districtname" value="<?php echo $dis_name ?>"/></td>
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
  <?php
      $selQuery="select * from tbl_district";
      $row=$con->query($selQuery);
      $i=0;
      while($data=$row->fetch_assoc()){
        $i++;
  ?>
  <tr>
    <td width="100"><?php echo $i; ?></td>
    <td width="100"><?php echo $data['district_name'] ?></td>
    <td width="100">
      <a href="district.php?did=<?php echo $data['district_id']  ?>">delete</a> <a href="district.php?eid=<?php echo $data['district_id'] ?>">Edit</a>
    </td>
  </tr>
  <?php
         }
    ?>
</table>
</body>
</html>

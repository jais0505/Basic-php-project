<?php
include("../Assets/connection/connection.php");

$place="";
$dis_id=0;
$eid=0;
$p_name = "";
$pid = "";

if(isset($_POST['btn_submit'])){
  $place=$_POST['txt_place'];
  $dis_id=$_POST['sel_district'];
  $eid=$_POST['txt_hidden'];
  if($eid){
    $upQuery="update tbl_place set place_name='".$place."' where place_id='".$eid."'";
    if($con->query($upQuery)){
      ?>
        <script>
          alert("Place updated");
          window.location="place.php";
        </script>
      <?php
    } else{
      ?>
        <script>
          alert("Place updation failed");
          window.location="place.php";
        </script>
      <?php
    }
  } else{
  $inQuery="insert into tbl_place(place_name,district_id) values('".$place."','".$dis_id."')";
  if($con->query($inQuery)){
    ?>
      <script>
        alert("Place added");
        window.location="place.php";
      </script>
    <?php
  } else{
    ?>
      <script>
        alert("Place adding failed");
        window.location="place.php";
      </script>
    <?php
  }
  }
  
}

if(isset($_GET['did'])){
  $delQuery="delete from tbl_place where place_id='".$_GET['did']."'";
  if($con->query($delQuery)){
    ?>
      <script>
        alert("Place deleted");
        window.location="place.php";
      </script>
    <?php
  }
}

if(isset($_GET['eid'])){
$selQuery="select * from tbl_place where place_id='".$_GET['eid']."' ";
$row=$con->query($selQuery);
$data=$row->fetch_assoc();
$p_name=$data['place_name'];
$pid=$data['place_id'];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="289" border="1">
    <tr>
      <td colspan="2"><div align="center">Place Form</div></td>
    </tr>
    <tr>
      <td width="136"><div align="center">District</div>
      <td><select name="sel_district" id="sel_district">
            <option>-----select district-----</option>
            <?php
              $selQuery="select * from tbl_district";
              $row=$con->query($selQuery);
              while($data=$row->fetch_assoc()){
          
            ?>
            <option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
             <?php
                }
            ?>
          </select>
      </td>
    </tr>
    <tr>
      <td width="136"><div align="center">Place</div></td>
      <td width="181"><label for="txt_place"></label>
        <input type="hidden" name="txt_hidden" id="txt_hidden" value="<?php echo $pid ?>">
        <input type="text" name="txt_place" id="txt_place" value="<?php echo $p_name ?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<table width="490" border="1">
  <tr>
    <td width="57"><div align="center">Sl NO</div></td>
    <td width="124"><div align="center">Place</div></td>
    <td width="128"><div align="center">District</div></td>
    <td width="153"><div align="center">Action</div></td>
  </tr>
   <?php
      $selQuery="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
      $row=$con->query($selQuery);
      $i=0;
      while($data=$row->fetch_assoc()){
        $i++;
    ?>
  <tr>
    <td><div align="center"><?php echo $i; ?></div></td>
    <td><?php echo $data['place_name'] ?></td>
    <td><?php echo $data['district_name'] ?></td>
    <td><a href="place.php?did=<?php echo $data['place_id'] ?>">delete</a>  <a href="place.php?eid=<?php echo $data['place_id'] ?>">edit</a></td>
  </tr>
   <?php
      }
    ?>
</table>

</body>
</html>

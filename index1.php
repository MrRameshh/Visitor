<?php
include("conncet.php");
$psale = $_GET["psale"];
$daddr = $_GET["daddr"];
 $sql = "INSERT INTO `gdata` (`psale`,`daddr`) VALUES ('$psale','$daddr');";
if ($conn->query($sql) === true) {
    header("location: page.html");
  die();
}
 else {
  echo "Error" . $sql . "<br>" . $conn->error;
}
?>


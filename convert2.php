<?php
$myfile = fopen("puclist.csv", "r") or die("Unable to open file!");
$newfile = fopen("details.csv", "w") or die("Unable to open new file...");

$record = fgets($myfile);
echo $record;
echo "<br>";

while(!feof($myfile)) {
  $record = fgets($myfile);
  $email = substr($record, strrpos($record,",")+1);
  $record = substr($record, 0, strrpos($record,",")-1);
  $phone = substr($record, strrpos($record,",")+1);
  $record = substr($record, 0, strrpos($record,","));
  $zip = substr($record, strrpos($record,",")+1);
  $record = substr($record, 0, strrpos($record,","));
  $state = substr($record, strrpos($record,",")+1);
  if($state=="OR") {
    $state="Oregon";
  } elseif($state=="WA") {
    $state="Washington";
  } elseif($state=="CA") {
    $state="California";
  } elseif($state=="AZ") {
    $state="Arizona";
  } elseif($state=="NY") {
    $state="New York";
  } else {
    $state="";
  }
  $record = substr($record, 0, strrpos($record,","));
  $city = substr($record, strrpos($record,",")+1);
  $record = substr($record, 0, strrpos($record,","));
  $address = substr($record, strrpos($record,",")+1);
  $record = substr($record, 0, strrpos($record,","));
  $sex = substr($record, strrpos($record,",")+1);
  $record = substr($record, 0, strrpos($record,","));
  $age = substr($record, strrpos($record,",")+1);
  $record = substr($record, 0, strrpos($record,","));
  $dob = substr($record, strrpos($record,",")+1);
  $fullname = substr($record, 0, strrpos($record,","));

  $fullname = trim($fullname, " \t\n\r\"");

  $lastname = substr($fullname, 0, strrpos($fullname,","));
  $firstname = substr($fullname, strrpos($fullname,",")+2);

  echo $firstname . "," . $lastname;
  echo "<br>";
  echo $address;
  echo "<br>";
  echo $city . ", " . $state . " " . $zip;
  echo "<br>";
  echo $phone;
  echo "<br>";
  echo $email;
  echo "<br>";

  $saveline = "$firstname,$lastname,$address,$city,$state,$zip,$phone,$email";
  fwrite($newfile, $saveline);
}
fclose($myfile);
fclose($newfile);
?>
